<?php

namespace App\Http\Controllers;

use App\Models\students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function StudentListView() {
        $data = students::all();
        return view ('admin.pages.studentlist',compact('data'));
    }
    public function CreateStudents() {

    }
    // public function DisplayStudents() {
    //     $data = students::all();
    //     return view('admin.pages.studentlist', compact('data'));

    // }
    public function UpdateStudents() {

    }
    public function DeleteStudents() {

    }
}
