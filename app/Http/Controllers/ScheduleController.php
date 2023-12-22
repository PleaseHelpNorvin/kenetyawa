<?php

namespace App\Http\Controllers;

use App\Models\teacherschedules;
use App\Models\Faculty_List;
use App\Models\room;
use App\Models\subject;
use App\Models\batch;
use App\Models\block;
use App\Models\StudentSchedule;
use App\Models\students;

use App\Models\studentschedulesreplacement;



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


        $teacherSchedules = []; 
        $selectRoom = room::find($teacherID);
        $selectSubject = subject::find($teacherID);
      

        if ($teacherID === 'null') {
        
            $selectTeacher = Faculty_List::latest()->get();

        } else {
            
            $teacherSchedules = teacherschedules::leftJoin('rooms', 'teacherschedule.room_id', '=', 'rooms.roomcode')
            ->leftJoin('subject', 'teacherschedule.subject_id', '=', 'subject.subjectcode')
            ->where('teacherschedule.faculty_list_id', $teacherID)
            ->select('teacherschedule.*', 'rooms.roomcode', 'subject.subjectcode','subject.subjectname')
            ->get();                
        }
        return view('admin.pages.schedule.teacherschedule.teacherschedule', compact('selectTeacher', 'teacherSchedules', 'selectRoom', 'selectSubject', 'activeTeacher'));    
    }

    public function showTeacherSchedule(){
     
        $selectTeacher = Faculty_List::latest()->get();

        return view('admin.pages.schedule.teacherschedule.teacherschedule', compact('selectTeacher'));
    
    }

    public function addTeacherSchedulepage(Request $request){

        $selectTeacher = Faculty_List::get();
        $selectSubject = subject::get();
        $selectRoom = room::get();
       
        return view('admin.pages.schedule.teacherschedule.add_teacherschedule', compact('selectTeacher','selectSubject','selectRoom') );
    }


    public function addTeacherSchedulePost(Request $request){

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
    
        // Check for existing schedules with the same time and day
        $existingSchedule = teacherschedules::where([
            'room_id' => $validatedData['room'],
            'day' => $validatedData['day'],
            'time_from' => $validatedData['time_from'],
            'time_to' => $validatedData['time_to'],
        ])->exists();
    
        if ($existingSchedule) {
            return redirect()->back()->withInput()->withErrors(['time_conflict' => 'There is a schedule conflict for this room, time and day.']);
        }
    
        // If no conflict, proceed to create a new schedule
        $teacherID = $validatedData['teacher_name'];
    
        $newSchedule = teacherschedules::create([
            'faculty_list_id' => $validatedData['teacher_name'],
            'subject_id' => $validatedData['subject'],
            'room_id' => $validatedData['room'],
            'day' => $validatedData['day'],
            'year' => $validatedData['year'],
            'semester' => $validatedData['semester'],
            'time_from' => $validatedData['time_from'],
            'time_to' => $validatedData['time_to'],
        ]);
    
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
            'time_to' => 'required|after:time_from',
        ]);
    
        try {
            $teacherSchedule->update([
                'faculty_list_id' => $request->input('teacher_name'),
                'subject_id' => $request->input('subject'),
                'room_id' => $request->input('room'),
                'day' => $request->input('day'),
                'year' => $request->input('year'),
                'semester' => $request->input('semester'),
                'time_from' => $request->input('time_from'),
                'time_to' => $request->input('time_to')
            ]);
    
            return redirect()->route('teacherscheduleview', [
                'id' => $teacherSchedule->id,
                'teacherID' => $teacherSchedule->faculty_list_id
            ])->with('success', 'Teacher Schedule updated successfully');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Error updating schedule']);
        }
    }
    
    public function deleteTeacherSchedule(Request $request, string $id){

        $schedule = teacherschedules::findOrFail($id);
        $teacherID = $schedule->faculty_list_id; 

        $schedule->delete();
        
        return redirect()->route('teacherscheduleview', ['teacherID' => $teacherID])->with('message', 'Successfully deleted');
    }

  
    public function showStudentSchedule(Request $request, $BatchId, $BlockId){

        $getBatch = batch::get();
        $findBatch = batch::find($BatchId);
        $findBlock = block::find($BlockId);
        $searchQuery = $request->input('search_studentSchedule');
    
        $getBlock = [];
        $selectStudentSchedule = [];
        $student = [];
    
        if ($BatchId != 'null') {
            $getBlock = block::where('batch_id', $BatchId)->get();
        }
    
        if ($BatchId != 'null' && $BlockId != 'null') {
            $query = StudentSchedule::where('batch_id', $BatchId)->where('block_id', $BlockId);
    
            if ($searchQuery) {
                $query->where('student_name', 'LIKE', '%' . $searchQuery . '%');
            }
    
            $selectStudentSchedule = $query->get();
            $student = students::where('batch', $BatchId)->where('block', $BlockId)->get();
        }
    
        return view('admin.pages.schedule.studentschedule.studentschedule', compact('getBatch', 'getBlock', 'findBatch', 'findBlock', 'selectStudentSchedule', 'student', 'searchQuery'));
    }

    public function addStudentSchedule($BatchId, $BlockId){
        $selectStudent = students::where('batch', $BatchId)
            ->where('block', $BlockId) 
            ->get();
    
        $selectTeacher = Faculty_List::get();
        $selectSubject = subject::get();
        $selectRoom = room::get();
        $findBatch = batch::find($BatchId);
        $findBlock = block::find($BlockId);
    
        return view('admin.pages.schedule.studentschedule.add_studentschedule', compact('findBatch', 'findBlock', 'selectTeacher', 'selectSubject', 'selectRoom', 'selectStudent'));
    }

    // public function addScheduleSave(Request $request ,$BatchId, $BlockId){
           
    //     $findBatch = batch::find($BatchId);
    //     $findBlock = block::find($BlockId);
    //     $request->validate([
    //         'block_id' => 'required',
    //         'batch_id' => 'required',
    //         'room_code' => 'required|string|max:255',
    //         'subject_name' => 'required|string|max:255',
    //         'teacher_name' => 'required|string|max:255',
    //         'day' => 'required',
    //         'status' => 'required',
    //         'time_in' => 'required|date_format:H:i',
    //         'time_out' => 'required|date_format:H:i|after:time_in',
    //     ]);

    //     StudentSchedule::create($request->all());

    //     return redirect()->route('studentscheduleview',['BatchId' => $findBatch ,'BlockId' => $findBlock])->with('success', 'Schedule added successfully!');
    // }

    public function addScheduleSave(Request $request, $BatchId, $BlockId)
{   
    $findBatch = Batch::find($BatchId);
    $findBlock = Block::find($BlockId);

    $request->validate([
        'block_id' => 'required',
        'batch_id' => 'required',
        'room_code' => 'required|string|max:255',
        'subject_name' => 'required|string|max:255',
        'teacher_name' => 'required|string|max:255',
        'day' => 'required',
        'status' => 'required',
        'time_in' => 'required|date_format:H:i',
        'time_out' => 'required|date_format:H:i|after:time_in',
    ]);

    // Check for existing schedules with the same time range, room, and day
    $conflictingSchedule = StudentSchedule::where([
        'room_code' => $request->room_code,
        'day' => $request->day,
    ])->where(function ($query) use ($request) {
        $query->whereBetween('time_in', [$request->time_in, $request->time_out])
            ->orWhereBetween('time_out', [$request->time_in, $request->time_out]);
    })->exists();

    if ($conflictingSchedule) {
        return redirect()->back()->withInput()->withErrors(['time_conflict' => 'There is a schedule conflict for this room, time, and day.']);
    }

    StudentSchedule::create($request->all());

    return redirect()->route('studentscheduleview', ['BatchId' => $findBatch ,'BlockId' => $findBlock])->with('success', 'Schedule added successfully!');
}

    public function deletestudentschedule($id){
        
        $schedule = StudentSchedule::find($id);

        if (!$schedule) {
            return redirect()->back()->with('error', 'Schedule not found.');
        }

        $schedule->delete();

        return redirect()->back()->with('success', 'Schedule deleted successfully!');
    }

    public function editstudentschedule($id,$BatchId, $BlockId){
        
        $findBatch = batch::find($BatchId);
        $findBlock = block::find($BlockId);
        $selectTeacher = Faculty_List::get();
        $selectStudent= students::get();
        $selectSubject = subject::get();
        $selectRoom = room::get();
        
        $studentSchedule = StudentSchedule::find($id);

        
        if (!$studentSchedule) {
            abort(404, 'Student Schedule not found');
        }

        return view('admin.pages.schedule.studentschedule.edit_studentschedule', compact('studentSchedule','selectTeacher','selectSubject','selectRoom', 'findBatch','findBlock','selectStudent'));
    }



    public function updatestudentschedule(Request $request, $id,$BatchId, $BlockId){

        $findBatch = batch::find($BatchId);
        $findBlock = block::find($BlockId);
        $request->validate([
        ]);

        $studentSchedule = StudentSchedule::find($id);

        if (!$studentSchedule) {
            abort(404, 'Student Schedule not found');
        }


        $studentSchedule->update([
            'teacher_name' => $request->input('teacher_name'),
            'subject_name' => $request->input('subject_name'),
            'room_code' => $request->input('room_code'),
            'status' => $request->input('status'),
            'day' => $request->input('day'),
            'time_in' => $request->input('time_in'),
            'time_out' => $request->input('time_out'),
        ]);

        return redirect()->route('studentscheduleview',['BatchId' => $findBatch ,'BlockId' => $findBlock])->with('success', 'Schedule added successfully!');
    }

    
   public function studentscheduleviewreplacement($BatchId, $BlockId,$studentID){

    $findBatch = batch::find($BatchId);
    $findBlock = block::find($BlockId);
    $studentsched = [];
   

    $student = students::where('batch', $BatchId)->where('block', $BlockId)->where('status', 'Replacement')->get();
    if($studentID != 'null'){
        $studentsched = studentschedulesreplacement::where('block_id', $BatchId)->where('batch_id', $BlockId)->where('status', 'Replacement')->where('student_name', $studentID)->get();
       
    }
    return view('admin.pages.schedule.studentschedule.studentreplacement', compact( 'student','findBatch','findBlock','studentsched','studentID'));
}
public function addSchedulereplacement($BatchId, $BlockId,$studentID){
    $selectTeacher = Faculty_List::get();
        $selectSubject = subject::get();
        $selectRoom = room::get();
        $findBatch = batch::find($BatchId);
        $findBlock = block::find($BlockId);
    

    return view('admin.pages.schedule.studentschedule.add_studentschedule_replacement', compact('findBatch', 'findBlock', 'selectTeacher', 'selectSubject', 'selectRoom','studentID'));
}

public function addScheduleSaveReplacement(Request $request, $BatchId, $BlockId,$studentID)
    {
        $request->validate([
            'teacher_name' => 'required',
            'subject_name' => 'required',
            'room_code' => 'required',
            'status' => 'required',
            'day' => 'required',
            'time_in' => 'required|',
            'time_out' => 'required|after:time_in',
        ]);

        StudentSchedulesReplacement::create([
            'batch_id' => $request->input('batch_id'),
            'block_id' => $request->input('block_id'),
            'student_name' => $request->input('student_name'),
            'teacher_name' => $request->input('teacher_name'),
            'subject_name' => $request->input('subject_name'),
            'room_code' => $request->input('room_code'),
            'status' => $request->input('status'),
            'day' => $request->input('day'),
            'time_in' => $request->input('time_in'),
            'time_out' => $request->input('time_out'),
        ]);

        return redirect()->route('studentreplacement', ['BatchId' => $BatchId, 'BlockId' => $BlockId , 'studentID' => $studentID])
            ->with('success', 'Schedule added successfully');
    }

    public function deleteSchedulereplacement($scheduleId)
{
    // Assuming you have a Schedule model
    $schedule = studentschedulesreplacement::find($scheduleId);

    if (!$schedule) {
        return redirect()->back()->with('error', 'Schedule not found');
    }

    $schedule->delete();

    return redirect()->back()->with('success', 'Schedule deleted successfully');
}
public function editScheduleReplacement($BatchId, $BlockId,$scheduleId)
{
    // Assuming you have a Schedule model
    $schedule = studentschedulesreplacement::find($scheduleId);

    if (!$schedule) {
        return redirect()->back()->with('error', 'Schedule not found');
    }

    $selectTeacher = Faculty_List::get();
    $selectSubject = subject::get();
    $selectRoom = room::get();
    $findBatch = batch::find($BatchId);
    $findBlock = block::find($BlockId);

    return view('admin.pages.schedule.studentschedule.edit_studentschedule_replacement', compact('schedule', 'selectTeacher', 'selectSubject', 'selectRoom','findBatch','findBlock'));
}




public function updateScheduleReplacement(Request $request, $BatchId, $BlockId ,$scheduleId,$scheduleName)
{
    // Validate the form data
    $validatedData = $request->validate([
        'teacher_name' => 'required|string',
        'subject_name' => 'required|string',
        'room_code' => 'required|string',
        'day' => 'required|string',
        'status' => 'required|string',
        'time_in' => 'required|',
        'time_out' => 'required|after:time_in',
    ]);

    // Update the schedule
    $schedule = studentschedulesreplacement::find($scheduleId);

    if (!$schedule) {
        return redirect()->back()->with('error', 'Schedule not found');
    }

    $schedule->update($validatedData);

    return redirect()->route('studentreplacement', ['BatchId' => $BatchId, 'BlockId' => $BlockId , 'studentID' => $scheduleName])
            ->with('success', 'Schedule added successfully');
    }

}




