<?php

namespace App\Http\Controllers;

use App\Models\teacherschedules;
use App\Models\Faculty_List;
use App\Models\room;
use App\Models\subject;


use App\Utils\Paginate;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    public function showSchedulenav(){
        return view('admin.pages.schedule.calendar');
    }
    public function showSchedule($teacherID){
        $selectTeacher = Faculty_List::latest()->get();
    
        $teacherSchedules = []; // Initialize $teacherSchedules variable
        $selectRoom = room::find($teacherID);
        $selectSubject = subject::find($teacherID);

        if ($teacherID === 'null') {
            // Handle when $teacherId is null
            $selectTeacher = Faculty_List::latest()->get();
        } else {
            
            // Handle when $teacherId is not null
            
            $teacherSchedules = teacherschedules::where('faculty_list_id', $teacherID)->get();
          
            // $selectRoom = room::find($teacherID);
            // $selectSubject = subject::find($teacherID);
                            
        }
    
        return view('admin.pages.schedule.teacherschedule.teacherschedule', compact('selectTeacher', 'teacherSchedules','selectRoom','selectSubject'));
    }


    public function showTeacherSchedule(){
     
              $selectTeacher = Faculty_List::latest()->get();

    // $teacherSchedules = teacherschedules::leftJoin('facultylist', 'teacherschedule.faculty_list_id', '=', 'facultylist.id_no')
    //     ->leftJoin('rooms', 'teacherschedule.room_id', '=', 'rooms.roomcode')
    //     ->leftjoin('subject', 'teacherschedule.subject_id', '=', 'subject.subjectcode')
    //     ->select(
    //         'teacherschedule.day','teacherschedule.time_from','teacherschedule.time_to','teacherschedule.year','teacherschedule.semester', // select all columns from teacherschedule
    //         'facultylist.name as teacher_name','facultylist.id as faculty_id',
    //         'rooms.roomcode', 
    //         'subject.subjectcode', 'subject.subjectname'
    //     )
    //     ->get();
    //         // dd($teacherSchedules);
    
    return view('admin.pages.schedule.teacherschedule.teacherschedule', compact('selectTeacher'));
    
}
// public function showTeacherIDSchedule($teacherID) {
//     $selectTeacher = Faculty_List::latest()->get();
    
//     $teacherSchedules = []; // Initialize $teacherSchedules variable

//     if ($teacherID === 'null') {
//         // Handle when $teacherId is null
//         $selectTeacher = Faculty_List::latest()->get();
//     } else {
        
//         // Handle when $teacherId is not null
//         $teacherSchedules = teacherschedules::where('faculty_list_id', $teacherID)->get();
//     }

//     return view('admin.pages.schedule.teacherschedule.teacherschedule', compact('selectTeacher', 'teacherSchedules'));
// }


   

    public function addTeacherSchedulepage(){
        $selectTeacher = Faculty_List::latest()->get();
        $selectSubject = subject::latest()->get();
        $selectRoom = room::latest()->get();
        
        return view('admin.pages.schedule.teacherschedule.add_teacherschedule', compact('selectTeacher','selectSubject','selectRoom') );
    }
    public function addTeacherSchedulePost(){
        $teacherSchedules = Teacher::select('facultylist.*', 'subject.subjectname', 'rooms.roomcode')
            ->join('subject', 'facultylist.id_no', '=', 'subject.subjectcode')
            ->join('rooms', 'facultylist.id_no', '=', 'rooms.roomcode')
            ->get();
    
        return view('teacher_schedule.index', compact('teacherSchedules'));
    }



    public function showStudentSchedule(){
      
        return view('admin.pages.schedule.studentschedule');
    }
}
