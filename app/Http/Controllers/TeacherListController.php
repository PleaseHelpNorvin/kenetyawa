<?php

namespace App\Http\Controllers;

// use Illuminate\Pagination\Paginator;

// use App\Utils\Paginate;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Str;
use App\Models\Faculty_List;
use Illuminate\Http\Request;

class TeacherListController extends Controller
{
    //
    public function editteacher($id){
        $teachers =Faculty_List::find($id);
        return view('admin.pages.teacher.edit_teacher', compact('teachers'));
    }
    
    public function updateTeacher(Request $request, $id){
        $teachers = Faculty_List::find($id);
        $validatedData = $request->validate([
            'id_no' => 'required',
            'faculty_name' => 'required',
            'faculty_course' => 'required',
            'faculty_email' => 'required|email',
        ]);
    
        $teachers->update([
            'id_no' => $validatedData['id_no'],
            'name' => $validatedData['faculty_name'],
            'course' => $validatedData['faculty_course'],
            'email' => $validatedData['faculty_email'],
        ]);
        return redirect('teacherlist')->with('message',"Teacher Updated Successfully");
    }

    public function addteacher(){
        return view('admin.pages.teacher.add_teacher');
    }
    
    public function showTeacherList()
    {
        $data = Faculty_List::latest()->paginate(4);
        return view('admin.pages.teacher.faculty_list', compact('data'));
    }

    public function search(Request $request){
        $searchQuery = $request->input('search_faculty');
        
        $data = Faculty_List::where('name', 'LIKE', '%' . $searchQuery . '%')->paginate(0);

        return view('admin.pages.teacher.faculty_list', compact('data'));
    }

    public function facultyFetch(Request $request){

        $validatedData = $request->validate([
            'id_no' => 'required',
            'faculty_name' => 'required',
            'faculty_course' => 'required',
            'faculty_email' => 'required|email'
        ]);

        Faculty_List::create([
            'id_no' => $validatedData['id_no'],
            'name' => $validatedData['faculty_name'],
            'course' => $validatedData['faculty_course'],
            'email' => $validatedData['faculty_email'],
        ]);
        return redirect()->route('teacherlistview')->with('success', 'Faculty member added successfully');
    }
   
    public function deleteFaculty(Request $request, string $id){
        
        $data = Faculty_List::where('id', $id)->delete();
    
        return redirect(route('teacherlistview'))->with('message','Successfully deleted');
    }

    

   
}
