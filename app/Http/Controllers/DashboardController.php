<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('dashboard.admin');
    }

    public function kaderDashboard()
    {
        return view('dashboard.kader');
    }

    public function ibuBalitaDashboard()
    {
        return view('dashboard.ibu_balita');
    }
}

