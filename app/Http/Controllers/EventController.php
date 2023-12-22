<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CalendarEventMaster;

class EventController extends Controller
{
    //
    public function getEvents(Request $request)
    {
        $events = CalendarEventMaster::select('id', 'title', 'start', 'end')->get();
        
        return response()->json($events);
        
    }
}
