<?php

namespace App\Libraries;

use CodeIgniter\Database\BaseConnection;
use Config\Database;

class TenantDatabaseService
{
    public function central(): BaseConnection
    {
        $config = config(Database::class)->default;
        $config['database'] = (string) env('database.default.database', 'hrms');
        return Database::connect($config, false);
    }

    public function provision(string $slug, int $companyId, int $ownerId): string
    {
        $central = $this->central();
        $database = $this->availableName('gichrms_' . preg_replace('/[^a-z0-9_]/', '_', strtolower($slug)), $central);
        $quotedDatabase = '`' . str_replace('`', '``', $database) . '`';

        $central->query("CREATE DATABASE {$quotedDatabase} CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
        try {
            $central->query('SET FOREIGN_KEY_CHECKS=0');
            foreach ($central->listTables() as $table) {
                $quotedTable = '`' . str_replace('`', '``', $table) . '`';
                $central->query("CREATE TABLE {$quotedDatabase}.{$quotedTable} LIKE {$quotedTable}");
            }

            $company = $central->table('companies')->where('id', $companyId)->get()->getRowArray();
            $owner = $central->table('users')->where('id', $ownerId)->get()->getRowArray();
            $tenantConfig = config(Database::class)->default;
            $tenantConfig['database'] = $database;
            $tenant = Database::connect($tenantConfig, false);
            $company['tenant_database'] = $database;
            $tenant->table('companies')->insert($company);
            $tenant->table('users')->insert($owner);

            $this->copyCompanyOnboardingData($central, $tenant, $companyId, (int) $owner['id']);

            // Preserve migration history so future schema upgrades start from this baseline.
            if ($central->tableExists('migrations')) {
                $rows = $central->table('migrations')->get()->getResultArray();
                if ($rows) $tenant->table('migrations')->insertBatch($rows);
            }
            return $database;
        } catch (\Throwable $e) {
            $central->query("DROP DATABASE IF EXISTS {$quotedDatabase}");
            throw $e;
        } finally {
            $central->query('SET FOREIGN_KEY_CHECKS=1');
        }
    }

    public function syncOnboardingData(int $companyId, string $database): void
    {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $database)) {
            throw new \InvalidArgumentException('Invalid tenant database name.');
        }
        $central = $this->central();
        $tenantConfig = config(Database::class)->default;
        $tenantConfig['database'] = $database;
        $tenant = Database::connect($tenantConfig, false);
        $owner = $central->table('users')->where('company_id', $companyId)->where('role', 'superadmin')->get()->getRowArray();
        $this->copyCompanyOnboardingData($central, $tenant, $companyId, (int) ($owner['id'] ?? 0));
    }

    private function copyCompanyOnboardingData(BaseConnection $central, BaseConnection $tenant, int $companyId, int $ownerId): void
    {
        $tables = ['users', 'departments', 'company_roles', 'company_email_settings'];
        $tenant->query('SET FOREIGN_KEY_CHECKS=0');
        try {
            foreach ($tables as $table) {
                if (!$central->tableExists($table) || !$tenant->tableExists($table) || !$central->fieldExists('company_id', $table)) continue;
                $rows = $central->table($table)->where('company_id', $companyId)->get()->getResultArray();
                foreach ($rows as $row) {
                    if ($table === 'users' && (int) ($row['id'] ?? 0) === $ownerId) continue;
                    $exists = isset($row['id']) && $tenant->table($table)->where('id', $row['id'])->countAllResults() > 0;
                    if (!$exists) $tenant->table($table)->insert($row);
                }
            }
        } finally {
            $tenant->query('SET FOREIGN_KEY_CHECKS=1');
        }
    }

    private function availableName(string $base, BaseConnection $db): string
    {
        $base = substr(trim($base, '_'), 0, 55) ?: 'gichrms_company';
        $candidate = $base;
        $suffix = 2;
        while ($db->query('SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = ?', [$candidate])->getRowArray()) {
            $candidate = substr($base, 0, 55) . '_' . $suffix++;
        }
        return $candidate;
    }
}
