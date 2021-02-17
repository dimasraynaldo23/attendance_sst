<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function edit()
    {
        return view('user.profile.edit');
    }
}
