<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function showDashboard(){
        return view('admin.pages.dashboard.dashboard');
    }
    
    // public function schedule(){
    //     return view('admin.pages.schedule');
    // }
}
