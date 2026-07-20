<?php

namespace App\Commands;

use App\Libraries\TenantDatabaseService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\Commands;
use Psr\Log\LoggerInterface;

class ProvisionTenant extends BaseCommand
{
    protected $group = 'Tenancy';
    protected $name = 'tenant:provision';
    protected $description = 'Provision an isolated database for an existing company.';
    protected $usage = 'tenant:provision <company-id>';

    public function __construct(LoggerInterface $logger, Commands $commands)
    {
        parent::__construct($logger, $commands);
    }

    public function run(array $params)
    {
        $companyId = (int) ($params[0] ?? 0);
        $service = new TenantDatabaseService();
        $central = $service->central();
        $company = $central->table('companies')->where('id', $companyId)->get()->getRowArray();
        if (!$company) return CLI::error('Company not found.');
        if (!empty($company['tenant_database'])) {
            $service->syncOnboardingData($companyId, (string) $company['tenant_database']);
            CLI::write('Synchronized onboarding data into ' . $company['tenant_database'] . '.', 'green');
            return;
        }

        $owner = $central->table('users')->where('company_id', $companyId)->where('role', 'superadmin')->get()->getRowArray();
        if (!$owner) return CLI::error('No company owner account was found.');

        $database = $service->provision((string) $company['slug'], $companyId, (int) $owner['id']);
        $central->table('companies')->where('id', $companyId)->update(['tenant_database' => $database]);
        CLI::write('Provisioned ' . $database . ' for ' . $company['name'] . '.', 'green');
    }
}
