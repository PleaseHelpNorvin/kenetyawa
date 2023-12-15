<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\students;
use App\Models\Faculty_List;
use App\Models\StudentSchedule;
use App\Models\teacherschedules;
use App\Models\studentschedulesreplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    //
    
   

    public function teacherID(){
        return view('admin.auth.teacherID');
    }
    public function teacherIdPost(Request $request){
     
        $teacher = Faculty_List::where('id_no', $request->teacherID)->first();
      
        if($teacher){
            return redirect()->route('teacherinfo', ['teacher_Id' => $teacher->id])->with('success', 'Login Successful');
        }
    
        return back()->with('message', 'Invalid Teacher ID');
    }

    public function teacherInfo(Request $request, $teacher_Id) {
        $teacher = Faculty_List::find($teacher_Id);
        $searchQuery = $request->input('search_teacherSchedDay');

        if (!$teacher) {
            return back()->with('message', 'Teacher not found');
        }

        $loggedInTeacherSchedules = teacherschedules::where('faculty_list_id', $teacher->id_no);
        
        if ($searchQuery) {
            $loggedInTeacherSchedules->where('day', 'LIKE', '%' . $searchQuery . '%');
        }
        $teacherLoginInfo=$loggedInTeacherSchedules->get();
        
        return view('admin.auth.teacherInfo', compact('teacher', 'teacherLoginInfo','searchQuery'));

    }
  
   

//    =============================================================================

    public function studentID(){
        
        return view('admin.auth.studentID');
    }
    public function studentInfo($id){
        // Retrieve the student information based on the provided ID
        $student = students::find($id);
    
        // Check if the student exists
        if (!$student) {
            // If no student found, redirect back with an error message
            return back()->with('message', 'Student not found.');
        }
    
        // Retrieve the batch and block information from the student
        $block = $student->block;
        $batch = $student->batch;
       $studentName =  $student->name;
        // Retrieve the schedule for the specific block and batch
        $getScheduleStudents = null;
    
        if ($student->status == 'Regular') {
            $getScheduleStudents = StudentSchedule::where('block_id', $block)
                ->where('batch_id', $batch)
                ->get();
        } elseif ($student->status == 'Replacement') {
            $getScheduleStudents = studentschedulesreplacement::where('block_id', $block)
                ->where('batch_id', $batch)
                ->where('student_name', $studentName)
                ->get();
        }
    
        // Pass the student data and schedule to the 'studentInfo' view
        return view('admin.auth.studentInfo', ['student' => $student, 'schedule' => $getScheduleStudents]);
    }
    
    
    public function studentIdPost(Request $request){
        // dd('studentIdPost');
        $studentid = students::where('student_no', $request->studentID)->first();
        // dd($studentid);
        if($studentid){
            return redirect()->route('studentinfo', ['id' => $studentid])->with('success', 'Login Successful');
        }
        return back()-> with('message','Wrong Student no.');
    }



    
    public function registerView(){
        return view('admin.auth.register');
    }
    
    public function registerAuth(request $request){
        $request -> validate([
            'name' => 'required',
            'email' =>'required|email|unique:users',
            'password' =>'required|min:6'
        ]);

        
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->intended('/dashboard')->with('message','Great! You have Successfully loggedin');
        
    }
    
    public function loginView(){
        return view('admin.auth.login');
    }
    public function loginAuth(request $request){
        $request -> validate([
            'email'=>'required',
            'password' => 'required'
        ]);

    $credentials = [ 
            'email' => $request->email,
            'password' => $request->password,
    ];

    if(Auth::attempt($credentials)){
        return redirect('/dashboard') -> with('success', 'Login Sucessful');
    }
    return back()-> with('error','bogoa sa giatay kalimot sa password');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('showLandingPage');
    }
}
