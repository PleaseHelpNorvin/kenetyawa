<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function showProfile(Request $request){
        return view('pages.profile',['user' => $request->user()]);
    }
    public function updateImage(Request $request){
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if($request->user()->image){
            File::delete(public_path('images/'. $request->user()->image));
        }

        $imageName = time().'.'.$request->images->extension();
        $request->image->move(public_path('images/', $imageName));

        User::where('id', auth()->user()->id)->update([
            'image' => $imageName
        ]);

        return redirect(route('edit.profile'))->with('message', 'Successfully Updated Image');
    }
}
