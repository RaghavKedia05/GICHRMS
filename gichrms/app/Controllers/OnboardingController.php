<?php

namespace App\Controllers;

use App\Libraries\TenantDatabaseService;

class OnboardingController extends BaseController
{
    public function complete()
    {
        $userId = (int) session('user_id');
        if ($userId < 1) {
            return $this->response->setStatusCode(401)->setJSON(['ok' => false]);
        }

        $updated = false;
        $connections = [db_connect(), (new TenantDatabaseService())->central()];
        foreach ($connections as $db) {
            try {
                if ($db->tableExists('users') && $db->fieldExists('onboarding_completed', 'users')) {
                    $db->table('users')->where('id', $userId)->update(['onboarding_completed' => 1]);
                    $updated = true;
                }
            } catch (\Throwable $e) {
                log_message('warning', 'Could not sync onboarding completion: ' . $e->getMessage());
            }
        }

        if (! $updated) {
            return $this->response->setStatusCode(500)->setJSON(['ok' => false]);
        }

        session()->set('onboarding_completed', true);
        return $this->response->setJSON(['ok' => true, 'onboarding_completed' => true]);
    }
}
