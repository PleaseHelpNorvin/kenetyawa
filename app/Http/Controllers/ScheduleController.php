<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function showSchedule(){
        return view('admin.pages.schedule');
    }
}
