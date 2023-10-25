<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function showDashboard(){
        return view('pages.dashboard');
    }
    
    public function schedule(){
        return view('pages.schedule');
    }
}
