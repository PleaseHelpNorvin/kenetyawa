<?php

namespace App\Http\Controllers;

use App\Utils\Paginate;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function showSchedule(){
        return view('admin.pages.calendar');
    }
    public function showTeacherSchedule(){
        return view('admin.pages.teacherschedule');
    }
    public function showStudentSchedule(){
      
        return view('admin.pages.studentschedule');
    }
}
