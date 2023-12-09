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
    
    public function showDashboard(){
        $teacherCount = Faculty_List::count();
        $studentCount = students::count();
        $subjectCount = subject::count();
        $roomCount = room::count();
        $reportCount = report::count();

        //dashboard to student url
        $batch = batch::first(); 
        $batchId = $batch ? $batch->id : null;
        $studentViewUrl = $batchId ? route('studentview', ['batchId' => $batchId, 'block' => 'null']) : null;
        

        return view('admin.pages.dashboard.dashboard', compact('teacherCount','studentCount','subjectCount','roomCount','reportCount','studentViewUrl'));
    }
    
    // public function schedule(){
    //     return view('admin.pages.schedule');
    // }
}
