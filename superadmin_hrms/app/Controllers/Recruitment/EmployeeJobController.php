<?php

namespace App\Controllers\Recruitment;

use App\Controllers\BaseController;
use App\Models\Recruitment\RequisitionModel;

class EmployeeJobController extends BaseController
{
    protected $requisitionModel;

    public function __construct()
    {
        $this->requisitionModel = new RequisitionModel();
    }

    public function index()
    {
        $data['jobs'] = $this->requisitionModel
            ->where('status', 'Published')
            ->where('hr_status', 'Approved')
            ->orderBy('published_at', 'DESC')
            ->findAll();

        // Ensure only logged-in employees can view internal career opportunities
        $userId = session('user_id');
        $userRole = session('role');

        if (!$userId) {
            return redirect()->to('/login');
        }

        // Optional: restrict to users with role 'employee'
        //if ($userRole !== 'employee') {
        //    return redirect()->to('/dashboard')
        //        ->with('error', 'Only employees can view internal career opportunities.');
        //}

        return view('Recruitment/employee-jobs', $data);
    }
}