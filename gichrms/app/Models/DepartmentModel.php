<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'departments';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'department_name',
        'department_code',
        'hod_id',
        'status'
    ];
}