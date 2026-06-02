<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }

    public function transporters()
    {
        return view('transporters');
    }

    public function drivers()
    {
        return view('drivers');
    }

    public function vehicles()
    {
        return view('vehicles');
    }
}