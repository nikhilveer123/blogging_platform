<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Admin Dashboard
    public function adminDashboard()
    {

        return view('admin.dashboard');
    }

    // Author Dashboard
    public function authorDashboard()
    {

        return view('author.dashboard');
    }
}
