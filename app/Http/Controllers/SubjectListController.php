<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectListController extends Controller
{
    //
    public function showSubjectList(){
        return view('admin.pages.subject.subject_list');
    }
    public function viewSubjectList(){
        
    }
}
