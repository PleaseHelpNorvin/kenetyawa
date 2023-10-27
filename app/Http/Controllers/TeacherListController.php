<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherListController extends Controller
{
    //
    public function showTeacherList(){
        return view('admin.pages.faculty_list');
    }
}
