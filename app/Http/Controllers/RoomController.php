<?php

namespace App\Http\Controllers;

use App\Models\room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function showRoom(){
        $data = room::latest()->get();
        return view('admin.pages.room.room', compact('data'));
    }
    public function addRoompage(){
        return view('admin.pages.room.add_room');
    }
    public function addRoomPost(Request $request){

        $validatedData = $request->validate([
            'room_code' => 'required',
        ]);

        room::create([
            'roomcode' => $validatedData['room_code'],
        ]);
        return redirect()->route('showroom')->with('success','subject added successfully');
    }
    public function deleteRoom(Request $request, string $id){
        
        $data = room::where('id', $id)->delete();
    
        return redirect()->route('showroom')->with('message','Successfully deleted');
        
    }
    public function editRoompage($id){
        $room = room::find($id);

        return view('admin.pages.room.edit_room', compact('room'));
    }
    public function updateRoompage(Request $request, $id){
        $room = room::find($id);
        $validatedData = $request->validate([
            'room_code' => 'required',
        ]);

        $room->update([
            'roomcode' => $validatedData['room_code'],
        ]);
        return redirect()->route('showroom')->with('success','subject added successfully');
    }
   
}
