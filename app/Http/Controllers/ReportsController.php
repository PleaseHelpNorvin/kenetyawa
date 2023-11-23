<?php

namespace App\Http\Controllers;

use App\Models\report;
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

    public function editReportpage($id){
        $data = report::find($id);

        return view('admin.pages.reports.edit_reports', compact('data'));
    }
    public function editReport(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Report_Title' => 'required|max:255',
            'Description' => 'required',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:4080', // Allow image upload if needed
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
}
