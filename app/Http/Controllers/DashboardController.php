<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty_List;
use App\Models\students;
use App\Models\subject;
use App\Models\room;
use App\Models\report;
use App\Models\batch;




class DashboardController extends Controller
{
    //
    public function showDashboard(){
        $teacherCount = Faculty_List::get()->count();
        $studentCount = students::get()->count();
        $subjectCount = subject::get()->count();
        $roomCount = room::get()->count();
        $reportCount = report::get()->count();

        //dashboard to student url
        $batch = batch::first(); 
        $batchId = $batch ? $batch->id : null;
        // $studentViewUrl = route('studentview', ['batchId' => $batchId, 'block' => 'null']);
        

        return view('admin.pages.dashboard.dashboard');
    }
    
    // public function schedule(){
    //     return view('admin.pages.schedule');
    // }
}
