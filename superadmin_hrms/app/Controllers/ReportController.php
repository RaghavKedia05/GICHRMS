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

    public function userReport()
    {
        return view('Reports/user_report');
    }
    public function employeeReport()
    {
        return view('Reports/employee_report');
    }
    public function payslipReport()
    {
        return view('Reports/payslip_report');
    }
}