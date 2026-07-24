<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'company_id',
        'employee_id',
        'name',
        'email',
        'password',
        'login_enabled',
        'onboarding_completed',
        'role',
        'position',
        'phone',
        'employment_type',
        'date_of_joining',
        'address',
        'department_id',
        'is_active'
    ];

    protected $returnType = 'array';
}
