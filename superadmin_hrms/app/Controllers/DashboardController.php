<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('dashboard');
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
}
