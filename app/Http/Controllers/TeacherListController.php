<?php

namespace App\Http\Controllers;

use App\Models\Faculty_List;
use Illuminate\Http\Request;

class TeacherListController extends Controller
{
    //

    public function teacherlistEdit(){
        return view("modals.faculty_modal_edit");
    }

    public function updateFaculty(Request $request, $id){

        $faculty = Faculty_List::find($id);
        
        if (!$faculty) {
            return redirect()->route('teacherlistview')->with('error', 'Faculty member not found');
        }
    
        $validatedData = $request->validate([
            'id_no' => 'required',
            'faculty_name' => 'required',
            'faculty_course' => 'required',
            'faculty_email' => 'required|email',
        ]);
    
        $faculty->update([
            'id_no' => $validatedData['id_no'],
            'name' => $validatedData['faculty_name'],
            'course' => $validatedData['faculty_course'],
            'email' => $validatedData['faculty_email'],
        ]);
    
        return redirect()->route('teacherlistview')->with('success', 'Faculty member updated successfully');
    }
    
    public function showTeacherList(){
        $data = Faculty_List::all();
        return view('admin.pages.faculty_list', compact('data'));
    }

    public function facultyFetch(Request $request){

        $validatedData = $request->validate([
            'id_no' => 'required',
            'faculty_name' => 'required',
            'faculty_course' => 'required',
            'faculty_email' => 'required|email',
        ]);

        // $data = $request->all();

        Faculty_List::create([
            'id_no' => $validatedData['id_no'],
            'name' => $validatedData['faculty_name'],
            'course' => $validatedData['faculty_course'],
            'email' => $validatedData['faculty_email'],
        ]);
        return redirect()->route('teacherlistview')->with('success', 'Faculty member added successfully');
    }

    // public function showFaculty(){
    //     $data = Faculty_List::all();
    //     return compact($data);
    // }
   
    public function deleteFaculty(Request $request, string $id){
        
        $data = Faculty_List::where('id', $id)->delete();
    
        return redirect(route('teacherlistview'))->with('message','Successfully deleted');
    }
}
