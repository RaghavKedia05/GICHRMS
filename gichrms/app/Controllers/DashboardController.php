<?php

namespace App\Controllers;

use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $completed = true;
        try {
            $db = db_connect();
            if ($db->fieldExists('onboarding_completed', 'users')) {
                $user = (new UserModel())->select('onboarding_completed')->find((int) session('user_id'));
                $completed = (bool) ($user['onboarding_completed'] ?? true);
                session()->set('onboarding_completed', $completed);
            }
        } catch (\Throwable $e) {
            log_message('warning', 'Could not load onboarding status: ' . $e->getMessage());
        }

        return view('dashboard', [
            'startProductTour' => ! $completed,
            'replayProductTour' => $this->request->getGet('tour') === 'replay',
        ]);
    }

    public function companies()
    {
        return view('companies');
    }

    public function subscriptions()
    {
        return view('subscriptions');
    }

    public function purchase_transaction()
    {
        return view('purchase_transaction');
    }

    public function packages()
    {
        return view('packages');
    }

    public function support_ticket()
    {
        return view('support_ticket');
    }

    public function invoice()
    {
        return view('invoice');
    }

    public function invoiceDetails($invoiceId = null)
    {
        $data = [
            'invoiceId' => $invoiceId
        ];

        return view('invoice_details', $data);
    }

    public function addInvoice()
    {
        return view('add_invoice');
    }

}
