<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function transporters()
    {
        return view('transporters');
    }

    public function vehicles()
    {
        return view('vehicles');
    }

    public function drivers()
    {
        return view('drivers');
    }
}