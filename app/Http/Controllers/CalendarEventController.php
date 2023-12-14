<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\CalendarEventMaster;
use App\Models\students;

class CalendarEventController extends Controller{
    //
    public function showSchedulenav(){
        $events = CalendarEventMaster::all();
    return view('admin.pages.schedule.calendar', compact('events'));
    }

    public function getEvent(){
        if(request()->ajax()){
            $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
            $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
            $events = CalendarEventMaster::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)
                    ->get(['id','title','start', 'end']);
            return response()->json($events);
        }
        return view('admin.pages.schedule.calendar');
        
    }
    
    public function createEvent(Request $request){
        $data = $request->except('_token');
        $events = CalendarEventMaster::insert($data);
        return response()->json($events);
    }
    
    public function deleteEvent(Request $request){
        $event = CalendarEventMaster::find($request->id);
        return $event->delete();
    }

    public function showSchedulenavstudent(){
        $events = CalendarEventMaster::all();
    return view('admin.pages.schedule.calendar', compact('events'));
    }

    
    public function showSchedulenav1($id){
        
        $student= students::find($id);
        $events = CalendarEventMaster::all();
    return view('admin.auth.event', compact('events','student'));
    }


}