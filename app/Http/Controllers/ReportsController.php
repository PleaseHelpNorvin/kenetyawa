<?php

namespace App\Http\Controllers;

use App\Models\report;
use App\Models\students;
use App\Models\Faculty_List;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    //
    public function showReports(){
        $data = report::latest()->get();
        return view ('admin.pages.reports.reports', compact('data'));
    }

    public function addReportpage(){
        return view ('admin.pages.reports.add_reports');
    }
    
    public function addReport(Request $request){
        $validatedData = $request->validate([
            'Report_Title' => 'required|max:255',
            'Description' => 'required',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4080',
        ]);

        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/reports/'), $imagePath);

            report::create([
                'reporttitle' => $validatedData['Report_Title'],
                'description' => $validatedData['Description'],
                'image' => $imagePath,
            ]);

            return redirect()->route('reportsview')->with('success', 'Subject added successfully');
        }

        return redirect()->back()->withInput()->withErrors(['Image' => 'Please select a valid image file.']);
    }

    public function deleteReport(Request $request, string $id){

        $data = report::where('id', $id)->delete();

        return redirect()->route('reportsview')->with('message','Successfully deleted');
        
    }
    public function deleteReportStudent(Request $request, string $id){

        $data = report::where('id', $id)->delete();

        return back();
        
    }
    // In your controller
public function updateStatus($id)
{
    $report = report::find($id);

    if ($report) {
        $report->update(['status' => 'Inactive']);
        // Additional logic or redirection if needed
    }

    return back(); // Redirect back to the previous page
}


    public function editReportpage($id){
        $data = report::find($id);

        return view('admin.pages.reports.edit_reports', compact('data'));
    }

    public function editReport(Request $request, $id){

        $validatedData = $request->validate([
            'Report_Title' => 'required|max:255',
            'Description' => 'required',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:4080', 
        ]);

        $report = Report::findOrFail($id);

        $updatedData = [
            'reporttitle' => $validatedData['Report_Title'],
            'description' => $validatedData['Description'],
        ];

        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $imagePath = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/reports/'), $imagePath);
            $updatedData['image'] = $imagePath;
        }

        $report->update($updatedData);

        return redirect()->route('reportsview')->with('success', 'Report updated successfully');
    }


    public function viewReportStudent($id){
        $student = students::find($id);
        $studentName = $student->name;
        $reports = report::where('name', $studentName)->get();
        return view('admin.auth.StudentReport',compact('student','reports'));
    }
    
    public function viewReportTeacher($id){
        $teacher = Faculty_List::find($id);
        $teachertName = $teacher->name;
        $reports = report::where('name', $teachertName)->get();
        return view('admin.auth.TeacherReport',compact('teacher','reports'));
    }
    public function addReportStudent(Request $request){

        
        $validatedData = $request->validate([
            'reporttitle' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4080',
            'status' => 'required',  
            'name' => 'required',  
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/reports/'), $imagePath);

            report::create([
                'reporttitle' => $validatedData['reporttitle'],
                'description' => $validatedData['description'],
                'image' => $imagePath,
                'status' => $validatedData['status'], 
                'name' => $validatedData['name'],      
            ]);

            return back()->with('success', 'Report added successfully.');
        }

        return redirect()->back()->withInput()->withErrors(['Image' => 'Please select a valid image file.']);
    }
}
