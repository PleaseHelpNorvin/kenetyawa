<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function StudentListView()
    {
        $data = students::all();
        return view('admin.pages.studentlist', compact('data'));
    }

    public function CreateStudents(Request $request)
    {
        $validatedData = $request->validate([
            'student_no' => 'required',
            'student_name' => 'required',
            'student_block' => 'required',
            'student_course' => 'required',
            'student_contact_no' => 'required',
            'student_email' => 'required|email', // Corrected field name
        ]);

        students::create([
            'student_no' => $validatedData['student_no'],
            'name' => $validatedData['student_name'],
            'block' => $validatedData['student_block'],
            'course' => $validatedData['student_course'],
            'contact_no' => $validatedData['student_contact_no'],
            'email' => $validatedData['student_email'],
        ]);

        return redirect()->route('studentview')->with('success', 'Student added successfully'); // Changed the route name
    }

    // Other methods for updating and deleting students can be implemented here.

    // public function DisplayStudents() {
    //     $data = students::all();
    //     return view('admin.pages.studentlist', compact('data'));

    // }
    public function UpdateStudents() {

    }
    public function DeleteStudents() {

    }
}
