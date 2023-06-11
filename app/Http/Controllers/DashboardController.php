<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        return view('Mdashboard');
    }
    public function super_manager_dashboard() {
        return view('Pages.SuperManager.SMdashboard');
    }
    public function my_controller_dashboard() {
        return view('Pages.MyController.Cdashboard');
    }
}
