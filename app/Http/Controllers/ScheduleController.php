<?php

namespace App\Http\Controllers;

use App\Models\teacherschedules;
use App\Models\Faculty_List;
use App\Models\room;
use App\Models\subject;
use App\Models\batch;
use App\Models\block;
use App\Models\StudentSchedule;

use App\Utils\Paginate;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    

    public function showSchedule($teacherID){
        $selectTeacher = Faculty_List::latest()->get();
        $activeTeacher = $selectTeacher->firstWhere('id_no', $teacherID);


        $teacherSchedules = []; // Initialize $teacherSchedules variable
        $selectRoom = room::find($teacherID);
        $selectSubject = subject::find($teacherID);
      

        if ($teacherID === 'null') {
            // Handle when $teacherId is null
            $selectTeacher = Faculty_List::latest()->get();
        } else {
            
            // Handle when $teacherId is not null
            
            $teacherSchedules = teacherschedules::leftJoin('rooms', 'teacherschedule.room_id', '=', 'rooms.roomcode')
            ->leftJoin('subject', 'teacherschedule.subject_id', '=', 'subject.subjectcode')
            ->where('teacherschedule.faculty_list_id', $teacherID)
            ->select('teacherschedule.*', 'rooms.roomcode', 'subject.subjectcode','subject.subjectname')
            ->get();
          
            // $selectRoom = room::find($teacherID);
            // $selectSubject = subject::find($teacherID);
                            
        }
        return view('admin.pages.schedule.teacherschedule.teacherschedule', compact('selectTeacher', 'teacherSchedules', 'selectRoom', 'selectSubject', 'activeTeacher'));    
    }

    public function showTeacherSchedule(){
     
        $selectTeacher = Faculty_List::latest()->get();
        // $activeTeacher = $selectTeacher->firstWhere('id_no', $teacherID);


        return view('admin.pages.schedule.teacherschedule.teacherschedule', compact('selectTeacher'));
    
    }

    public function addTeacherSchedulepage(Request $request){
        // $selectSchedule = teacherschedules::find('teacherID');
        // $selectTeacherId = Faculty_List::find($teacherID);
        $selectTeacher = Faculty_List::get();
        $selectSubject = subject::get();
        $selectRoom = room::get();
        // dd($selectTeacher);
        return view('admin.pages.schedule.teacherschedule.add_teacherschedule', compact('selectTeacher','selectSubject','selectRoom') );
    }

    public function addTeacherSchedulePost(Request $request ){
        // $selectTeacher = Faculty_List::find($teacherID);
        // dd(addTeacherSchedulePost);
        // $selectSubject = Subject::find($request->subject); // Assuming subject ID comes from the form
        // $selectRoom = Room::find($request->room);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'teacher_name' => 'required',
            'subject' => 'required',
            'room' => 'required',
            'day' => 'required',
            'year' => 'required',
            'semester' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
        ]);

        $teacherID = $validatedData['teacher_name'];

        // Create a new TeacherSchedule instance and populate it with validated data
        $newSchedule = teacherschedules::create([
            'faculty_list_id' => $validatedData['teacher_name'],
            'subject_id' => $validatedData['subject'],
            'room_id' => $validatedData['room'],
            'day' => $validatedData['day'],
            'year' => $validatedData['year'],
            'semester' => $validatedData['semester'],
            'time_from' => $validatedData['time_from'],
            'time_to' => $validatedData['time_to'],
            // Add other fields as needed
        ]);
        // return redirect()->route('studentview', ['batchId' => $selectedBatch->id, 'block' => $selectedBlock->id])->with('success', 'Student added successfully');
        // Redirect to a view or route after successfully adding the schedule
        // ['teacherID' => 'null']
        // ['teacherID' => $selectTeacher->id]
        return redirect()->route('teacherscheduleview', ['teacherID' => $teacherID])->with('success', 'Teacher schedule added successfully!');
    }

    public function viewEditTeacherSched(Request $request,$id ){
        $teacherSchedule = teacherschedules::findOrFail($id);
        
        $teachers = Faculty_List::get();
        $activeTeacher = $teachers->firstWhere('id_no', $id);        
           
        $subjects = subject::get();
        $rooms = room::all();
        $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    
        return view('admin.pages.schedule.teacherschedule.edit_teacherschedule', compact('teacherSchedule', 'teachers', 'subjects', 'rooms','days','activeTeacher'));
    }

    public function updateTeacherSchedPost(Request $request, $id){

   $teacherSchedule = teacherschedules::findOrFail($id);

   $validatedData = $request->validate([
       'teacher_name' => 'required',
       'subject' => 'required',
       'room' => 'required',
       'day' => 'required',
       'year' => 'required',
       'semester' => 'required',
       'time_from' => 'required',
       'time_to' => 'required'
   ]);

   // Update the teacher schedule using the update method
   $teacherSchedule->update([
       'faculty_list_id' => $request->input('teacher_name'),
       'subject_id' => $request->input('subject'),
       'room_id' => $request->input('room'),
       'day' => $request->input('day'),
       'year' => $request->input('year'),
       'semester' => $request->input('semester'),
       'time_from' => $request->input('time_from'),
       'time_to' => $request->input('time_to')
       // Add more fields to update as needed
   ]);

   // Redirect back to the view with a success message or any other action
   return redirect()->route('teacherscheduleview', ['id' => $teacherSchedule->id, 'teacherID' => $teacherSchedule->faculty_list_id])
       ->with('success', 'Teacher Schedule updated successfully');
}


    public function deleteTeacherSchedule(Request $request, string $id){
        // Retrieve the schedule details to get the associated teacher ID
        $schedule = teacherschedules::findOrFail($id);
        $teacherID = $schedule->faculty_list_id; // Assuming teacherID is stored in faculty_list_id
    
        // Delete the schedule
        $schedule->delete();
        
        // Redirect to scheduleview route with the teacherID parameter
        return redirect()->route('teacherscheduleview', ['teacherID' => $teacherID])->with('message', 'Successfully deleted');
    }

    //STUDENT SCHEDULE FUNCTIONS
    public function showStudentSchedule($BatchId, $BlockId) {
        $getBtach = batch::get();
        $getBlock = [];
$selectStudentSchedule = [];
        if ($BatchId != 'null') {
            $getBlock = block::where('batch_id', $BatchId)->get();
        }

        if ($BatchId != 'null' && $BlockId != 'null') {
            $selectStudentSchedule = StudentSchedule::get();
        }
        $findBatch = batch::find($BatchId);
        $findBlock = block::find($BlockId);
    
    
        return view('admin.pages.schedule.studentschedule.studentschedule', compact('getBtach', 'getBlock', 'findBatch','findBlock','selectStudentSchedule'));
    }
    

    public function addStudentSchedule($BatchId, $BlockId){
        $selectTeacher = Faculty_List::get();
        $selectSubject = subject::get();
        $selectRoom = room::get();
        $findBatch = batch::find($BatchId);
        $findBlock = block::find($BlockId);
        return view('admin.pages.schedule.studentschedule.add_studentschedule', compact('findBatch','findBlock','selectTeacher','selectSubject','selectRoom'));
    }

    public function addScheduleSave(Request $request ,$BatchId, $BlockId)
    {
        $findBatch = batch::find($BatchId);
        $findBlock = block::find($BlockId);
        $request->validate([
            'block_id' => 'required',
            'batch_id' => 'required',
            'room_code' => 'required|string|max:255',
            'subject_name' => 'required|string|max:255',
            'teacher_name' => 'required|string|max:255',
            'day' => 'required',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i|after:time_in',
        ]);

        StudentSchedule::create($request->all());

        return redirect()->route('studentscheduleview',['BatchId' => $findBatch ,'BlockId' => $findBlock])->with('success', 'Schedule added successfully!');
    }

   

    
}
