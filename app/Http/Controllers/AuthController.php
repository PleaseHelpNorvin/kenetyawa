<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\students;
use App\Models\Faculty_List;
use App\Models\teacherschedules;
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
        $teacherId = $request->teacherID; // Get teacherID from the form input
    
        $teacher = Faculty_List::where('id_no', $teacherId)->first();
    
        if($teacher){
            return redirect()->route('teacherinfo', ['teacher_Id' => $teacher->id_no])->with('success', 'Login Successful');
        }
    
        return back()->with('message', 'Invalid Teacher ID');
    }


    public function teacherInfo(Request $request, $teacherId) {
        $teacher = Faculty_List::where('id_no', $teacherId)->first();

        if (!$teacher) {
            return back()->with('message', 'Teacher not found');
        }
        // $teacher
        $loggedInTeacherSchedules = teacherschedules::where('faculty_list_id', $teacher->id_no)->get();
    
        // return view('admin.auth.teacherInfo', ['loggedInTeacher' => $teacher,'loggedInTeacherSchedules' => $loggedInTeacherSchedules,]);
        return view('admin.auth.teacherInfo', compact('teacher', 'loggedInTeacherSchedules'));

    }
  
   

//    =============================================================================

    public function studentID(){
        return view('admin.auth.studentID');
    }
    public function studentInfo(){
        return view('admin.auth.studentInfo');
    }
    public function studentIdPost(Request $request){
        // dd('studentIdPost');
        $studentid = students::where('student_no', $request->studentID)->first();
        // dd($studentid);
        if($studentid){
            return redirect()->route('studentinfo') -> with('success', 'Login Sucessful');
        }
        return back()-> with('message','bogoa sa giatay kalimot sa password');
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
        //$check = $this->create($data);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->intended('/dashboard')->with('message','Great! You have Successfully loggedin');

        // $user = new User();
        // $user -> name = $request->name;
        // $user -> email = $request->email;
        // $user -> password = Hash::make($request->password);

        // $user -> save();
        
        // return back()-> with('success', 'Register Successfully');
        
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
