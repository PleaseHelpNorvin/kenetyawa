<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseListController extends Controller
{
    //
    public function viewCourseList(){
        return view('admin.pages.course_list');
    }
}
