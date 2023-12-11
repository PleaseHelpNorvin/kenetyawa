<?php

namespace App\Http\Controllers;

use App\Models\batch;
use App\Models\block;
use App\Models\students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function getBlocks($batchId){
        
        $selectedBatch = batch::find($batchId);
    
        if (!$selectedBatch) {
            abort(404);
        }
    
        $blocks = block::where('batch_id', $batchId)->get();
    
        return view('admin.pages.student.blocks', ['selectedBatch' => $selectedBatch, 'blocks' => $blocks]);
    }

    public function StudentListView($batch_id, $block, $status = null){

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
            $selectedBatch = batch::find($batch_id);
            $selectedBlock = block::find($block);
            $studentsQuery = students::where('batch', $batch_id)
                ->where('block', $block);

            if ($status) {
                $studentsQuery->where('status', $status);
            }

            $students = $studentsQuery->get();
        }

    return view('admin.pages.student.studentlist', compact('batches', 'blocks', 'selectedBatch', 'students', 'batch_id', 'block', 'selectedBlock','status'));
    }

    public function CreateStudents(Request $request , $batch_id,$block){

        $selectedBlock = block::find($block);
        $selectedBatch = batch::find($batch_id);
        $validatedData = $request->validate([
            'student_no' => 'required|string|max:255',
            'status' => 'required',
            'student_name' => 'required|string|max:255',
            'student_block' => 'required', 
            'student_batch' => 'required', 
            'student_course' => 'required|string|max:255',
            'student_contact_no' => 'required|string|max:255',
            'student_email' => 'required|email|max:255',
        ]);

        students::create([
            'student_no' => $validatedData['student_no'],
            'status' => $validatedData['status'],
            'name' => $validatedData['student_name'],
            'block' => $validatedData['student_block'],
            'batch' => $validatedData['student_batch'],
            'course' => $validatedData['student_course'],
            'contact_no' => $validatedData['student_contact_no'],
            'email' => $validatedData['student_email'],
        ]);

        return redirect()->route('studentview', ['batchId' => $selectedBatch->id, 'block' => $selectedBlock->id])->with('success', 'Student added successfully');
    }

    public function updateStudents(Request $request, students $student){
        
        $selectstudent = students::find($student);
        
        $request->validate([
            'student_no' => 'required|string|max:255',
            'status' => 'required',
            'name' => 'required|string|max:255',
            'batch' => 'required', 
            'block' => 'required', 
            'course' => 'required|string|max:255',
            'contact_no' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $student->update([
            'student_no' => $request->input('student_no'),
            'status' => $request->input('status'),
            'name' => $request->input('name'),
            'batch' => $request->input('batch'),
            'block' => $request->input('block'),
            'course' => $request->input('course'),
            'contact_no' => $request->input('contact_no'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('studentview', ['batchId' => $student->batch, 'block' => $student->block]);
    }


    public function DeleteStudents(students $student){
            
        $student->delete();

        return redirect()->back()->with('success', 'Student deleted successfully');
    }


    public function showaddstudent($batch_id, $block){

        $selectedBlock = block::find($block);
        $selectedBatch = batch::find($batch_id);
    
        return view('admin.pages.student.add_student', compact('selectedBatch','selectedBlock'));

    }

    public function showeditstudent($student){

        $selectstudent = students::find($student);

        return view('admin.pages.student.edit_student',compact('selectstudent'));
    }

    public function deleteBatchAndAssociatedBlocksAndStudents($batch_id){
        
        $batch = Batch::find($batch_id);
        
        if (!$batch) {
            abort(404);
        }

        $batch->deleteWithBlocksAndStudents();

        return redirect()->back()->with('success', 'Batch and associated blocks & students deleted successfully');
    }

    public function deleteBlockAndAssociatedStudents($block_id){
        
        $block = Block::find($block_id);
        
        if (!$block) {
            abort(404);
        }

        $block->deleteWithStudents();

        return redirect()->back()->with('success', 'Block and associated students deleted successfully');
    }

    //done sent ni elai

}
