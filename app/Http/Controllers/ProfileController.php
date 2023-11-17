<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    //
    public function showProfile(Request $request){
        return view('admin.pages.profile.profile',['user' => $request->user()]);
    }
    
    public function updateImage(Request $request){
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($request->user()->image);
        
        if (auth()->check() && auth()->user()->image) {
            File::delete(public_path('images/' . auth()->user()->image));
        }
         

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        User::where('id', auth()->user()->id)->update([
            'image' => $imageName
        ]);

        return redirect(route('edit.profile'))->with('message', 'Successfully Updated Image');  
    }
}
