<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyRoleModel extends Model
{
    protected $table = 'company_roles';
    protected $returnType = 'array';
    protected $allowedFields = ['company_id', 'name', 'slug', 'created_at'];
}
