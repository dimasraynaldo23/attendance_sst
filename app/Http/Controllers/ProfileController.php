<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile.index');
    }

    public function biodata()
    {
        return view('user.profile.biodata');
    }

    public function edit(Request $request)
    {
        return view('user.profile.edit', [
            'user' => $request->user()
        ]);
    }

    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->name = $request->input('name');
        $user->nik = $request->input('nik');
        $user->email = $request->input('email');
        $user->position = $request->input('position');
        $user->address = $request->input('address');

        if($request->hasfile('avatar'))
        {
            $destination = 'uploads/profile/'.$user->avatar;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =  time() . '.' . $extension;
            $file->move('uploads/profile/', $filename);
            $user->avatar = $filename;
        }

        $user->update();
        return redirect('biodata')->with('status','Profile updated!');

    }   

    // public function update(Request $request, User $user)
    // {
    //     $request->validate(
    //         [
    //             'name' => 'required',
    //             'email' => 'required',
    //             'position' => 'required',
    //             'address' => 'required',
    //             'avatar' => 'required'
    //         ]);

    //         User::where('id', $user->id)
    //         ->update([
    //             'name' => $request->nama,
    //             'email' => $request->email,
    //             'position' => $request->position,
    //             'address' => $request->address,
    //         ]);
    //         return redirect()->route('user.profile.edit');
    // }
}
