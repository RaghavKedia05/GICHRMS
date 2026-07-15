<?php

namespace App\Controllers;

class PackageController extends BaseController
{
    public function index()
    {
        return view('packages');
    }

    public function grid()
    {
        return view('package_grid');
    }
}
