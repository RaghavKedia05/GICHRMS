<?php

namespace App\Controllers;

class PackageController extends BaseController
{
    public function index()
    {
        return view('package');
    }

    public function grid()
    {
        return view('package-grid');
    }
}