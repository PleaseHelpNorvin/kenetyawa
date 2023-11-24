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


   

    public function addTeacherSchedulepage(Request $request){
        // $selectSchedule = teacherschedules::find('teacherID');
        // $selectTeacherId = Faculty_List::find($teacherID);
        $selectTeacher = Faculty_List::get();
        $selectSubject = subject::get();
        $selectRoom = room::get();
        // dd($selectTeacher);
        return view('admin.pages.schedule.teacherschedule.add_teacherschedule', compact('selectTeacher','selectSubject','selectRoom') );
    }

    public function addTeacherSchedulePost(Request $request){
        // $selectTeacher = Faculty_List::find($teacherID);
        // dd(addTeacherSchedulePost);
        // $selectSubject = Subject::find($request->subject); // Assuming subject ID comes from the form
        // $selectRoom = Room::find($request->room);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'teacher_name' => 'required|exists:facultylist,id',
            'subject' => 'required|exists:subject,id',
            'room' => 'required|exists:rooms,id',
            'day' => 'required',
            'year' => 'required',
            'semester'=>'required',
            'time_from' => 'required',
            'time_to' => 'required'
        ]);

        // Create a new TeacherSchedule instance and populate it with validated data
        $teacherSchedule = teacherschedules::create([
            'faculty_list_id' => $validatedData['teacher_name'],
            'subject_id' => $validatedData['subject'],
            'room_id' => $validatedData['room'],
            'day' => $validatedData['day'],
            'year'=>$validatedData['year'],
            'semester'=>$validatedData['semester'],
            'time_from' => $validatedData['time_from'],
            'time_to' => $validatedData['time_to']
        ]);
        // return redirect()->route('studentview', ['batchId' => $selectedBatch->id, 'block' => $selectedBlock->id])->with('success', 'Student added successfully');
        // Redirect to a view or route after successfully adding the schedule
        // ['teacherID' => 'null']
        // ['teacherID' => $selectTeacher->id]
        return redirect()->route('teacherscheduleview')->with('success', 'Teacher schedule added successfully!');
    
    }


    public function showStudentSchedule(){
    
        return view('admin.pages.schedule.studentschedule');
    }
}
