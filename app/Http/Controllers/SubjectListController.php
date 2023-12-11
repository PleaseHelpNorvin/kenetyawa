<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;

class SubjectListController extends Controller
{
    //
    public function showSubjectList(){
        $data = subject::latest()->paginate(4);
        return view('admin.pages.subject.subject_list', compact('data'));
    }
    
    public function addSubjectpage(){
        return view('admin.pages.subject.add_subject');
    }
    public function addSubject(Request $request){
        $validatedData = $request->validate([
            'subject_code' => 'required',
            'Subject_name' => 'required',
        ]);

        subject::create([
            'subjectcode' => $validatedData['subject_code'],
            'subjectname' => $validatedData['Subject_name'],
        ]);
        return redirect()->route('subjectlistview')->with('success','subject added successfully');
    }

    public function editSubjectpage($id){

        $subject = subject::find($id);

        return view('admin.pages.subject.edit_subject', compact('subject'));
    }
    public function updateSubject(Request $request, $id){
        $subject = subject::find($id);
        $validatedData = $request->validate([
            'subject_code' => 'required',
            'Subject_name' => 'required',
        ]);
    
        $subject->update([
            'subjectcode' => $validatedData['subject_code'],
            'subjectname' => $validatedData['Subject_name'],
        ]);
        return redirect()->route('subjectlistview')->with('message',"Teacher Updated Successfully");
    }

    public function deleteSubject(Request $request, string $id){

        $data = subject::where('id', $id)->delete();

        return redirect()->route('subjectlistview')->with('message','Successfully deleted');
        
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search_subject');
        
        $data = subject::where('subjectname', 'LIKE', '%' . $searchQuery . '%')->paginate(0);

        return view('admin.pages.subject.subject_list', compact('data'));
    }

}
