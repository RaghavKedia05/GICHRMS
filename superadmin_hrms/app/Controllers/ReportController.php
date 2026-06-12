<?php

namespace App\Controllers;

class ReportController extends BaseController
{
    public function expenseReport()
    {
        return view('Reports/expense_report');
    }

    public function invoiceReport()
    {
        return view('Reports/invoice_report');
    }

    public function paymentReport()
    {
        return view('Reports/payment_report');
    }

    public function projectReport()
    {
        return view('Reports/project_report');
    }
}