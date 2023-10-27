<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //
    public function showReports(){
        return view ('admin.pages.reports');
    }
}
