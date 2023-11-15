<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\block;
use App\Models\students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function getBlocks($batchId)
    {
        $selectedBatch = batch::find($batchId);
    
        if (!$selectedBatch) {
            abort(404);
        }
    
        $blocks = block::where('batch_id', $batchId)->get();
    
        return view('admin.pages.blocks', ['selectedBatch' => $selectedBatch, 'blocks' => $blocks]);
    }

   public function StudentListView($batch_id, $block)
{
    $batches = batch::all();
    $blocks = block::all();
    $students = [];

    $selectedBatch = null;
    $selectedBlock = null;
   

    if ($batch_id != 'null') {
        $selectedBlock = block::find($block);
        $selectedBatch = batch::find($batch_id);
        $blocks = block::where('batch_id', $batch_id)->get();
        
    }

    if ($batch_id != 'null' && $block != 'null') {
        $selectedBlock = block::find($block);
        $students = students::where('batch', $batch_id)
            ->where('block', $block)
            ->get();
            
    }

    return view('admin.pages.studentlist', compact('batches', 'blocks', 'selectedBatch', 'students', 'batch_id', 'block','selectedBlock'));
}


    public function displayStudentsByBlock($batchId, $blockId){

        $selectedBatch = batch::find($batchId);
        $selectedBlock = block::find($blockId);

            if (!$selectedBatch || !$selectedBlock) {
                abort(404);
            }

        $students = students::get(); 
   // select('batch.batch')
  //  where('batch', $batchId)
   // /->leftJoin('batch','students.batch','=','batch.batch_no')
   // ->leftJoin('block','students.block','=','block.block_no')
        //->where('students.block', $blockId)
       // ->where('students.batch',$batchId)
        
        return view('admin.pages.students_by_block', [
            'selectedBatch' => $selectedBatch,
            'selectedBlock' => $selectedBlock,
            'students' => $students,
        ]);
    }

    public function CreateStudents(Request $request)
    {
        $validatedData = $request->validate([
            'student_no' => 'required',
            'student_name' => 'required',
            'student_block' => 'required',
            'student_batch' => 'required', // Corrected field name
            'student_course' => 'required',
            'student_contact_no' => 'required',
            'student_email' => 'required|email',
        ]);

        students::create([
            'student_no' => $validatedData['student_no'],
            'name' => $validatedData['student_name'],
            'block' => $validatedData['student_block'],
            'batch' => $validatedData['student_batch'], // Corrected field name
            'course' => $validatedData['student_course'],
            'contact_no' => $validatedData['student_contact_no'],
            'email' => $validatedData['student_email'],
        ]);

        return redirect()->back()->with('success', 'Block added successfully');
    }

    // ... (other methods)

    // Other methods for updating and deleting students can be implemented here.

    // public function DisplayStudents() {
    //     $data = students::all();
    //     return view('admin.pages.studentlist', compact('data'));

    // }
    public function updateStudents(Request $request, students $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add other validation rules for other fields
        ]);
    
        $student->update([
            'name' => $request->input('name'),
            // Update other fields as needed
        ]);
    
        return redirect()->back()->with('success', 'Student updated successfully');
    }

    public function DeleteStudents(students $student)
{
    $student->delete();

    return redirect()->back()->with('success', 'Student deleted successfully');
}
}
