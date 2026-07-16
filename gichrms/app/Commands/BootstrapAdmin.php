<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class BootstrapAdmin extends BaseCommand
{
    protected $group = 'Application';
    protected $name = 'app:bootstrap-admin';
    protected $description = 'Creates the first company administrator after migrations.';
    protected $usage = 'app:bootstrap-admin [--email user@example.com] [--name "Manager Name"] [--company "Company Name"]';
    protected $options = [
        '--email' => 'Administrator email address.',
        '--name' => 'Administrator display name.',
        '--company' => 'Company name. The migrated default company is renamed when it has no users.',
    ];

    public function run(array $params)
    {
        $db = db_connect();

        foreach (['companies', 'users'] as $table) {
            if (! $db->tableExists($table)) {
                CLI::error("Missing {$table} table. Run: php spark migrate");

                return EXIT_ERROR;
            }
        }

        if ($db->table('users')->where('role', 'admin')->countAllResults() > 0) {
            CLI::error('An administrator already exists. Use the Staff screen to manage additional accounts.');

            return EXIT_ERROR;
        }

        $email = trim((string) (CLI::getOption('email') ?? CLI::prompt('Administrator email', null, 'required|valid_email')));
        $name = trim((string) (CLI::getOption('name') ?? CLI::prompt('Administrator name', null, 'required|min_length[3]')));
        $companyName = trim((string) (CLI::getOption('company') ?? CLI::prompt('Company name', null, 'required|min_length[2]')));

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            CLI::error('Provide a valid administrator email address.');

            return EXIT_ERROR;
        }

        if (mb_strlen($name) < 3 || mb_strlen($companyName) < 2) {
            CLI::error('The administrator and company names are too short.');

            return EXIT_ERROR;
        }

        if ($db->table('users')->where('email', $email)->countAllResults() > 0) {
            CLI::error('That email address already belongs to a user.');

            return EXIT_ERROR;
        }

        $company = $db->table('companies')->where('is_active', 1)->orderBy('id')->get()->getRowArray();
        $password = $this->generatePassword();

        $db->transStart();

        if ($company === null) {
            $db->table('companies')->insert([
                'name' => $companyName,
                'slug' => $this->uniqueSlug($companyName),
                'is_active' => 1,
            ]);
            $companyId = (int) $db->insertID();
        } else {
            $companyId = (int) $company['id'];
            if ($db->table('users')->where('company_id', $companyId)->countAllResults() === 0) {
                $db->table('companies')->where('id', $companyId)->update([
                    'name' => $companyName,
                    'slug' => $this->uniqueSlug($companyName, $companyId),
                ]);
            }
        }

        $db->table('users')->insert([
            'company_id' => $companyId,
            'employee_id' => 'ADMIN001',
            'name' => $name,
            'email' => mb_strtolower($email),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'login_enabled' => 1,
            'role' => 'admin',
            'is_active' => 1,
        ]);

        $db->transComplete();

        if (! $db->transStatus()) {
            CLI::error('The administrator could not be created. No changes were saved.');

            return EXIT_ERROR;
        }

        CLI::write('Initial administrator created successfully.', 'green');
        CLI::write("Email: {$email}");
        CLI::write("Temporary password: {$password}", 'yellow');
        CLI::write('Sign in and change this temporary password immediately. It will not be shown again.');

        return EXIT_SUCCESS;
    }

    private function generatePassword(): string
    {
        $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789!@#$%';
        $password = 'Aa1!';

        for ($i = 0; $i < 16; $i++) {
            $password .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return str_shuffle($password);
    }

    private function uniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $base = trim(preg_replace('/[^a-z0-9]+/', '-', mb_strtolower($name)), '-') ?: 'company';
        $slug = $base;
        $suffix = 2;

        while (true) {
            $builder = db_connect()->table('companies')->where('slug', $slug);
            if ($ignoreId !== null) {
                $builder->where('id !=', $ignoreId);
            }
            if ($builder->countAllResults() === 0) {
                return $slug;
            }
            $slug = $base . '-' . $suffix++;
        }
    }
}
