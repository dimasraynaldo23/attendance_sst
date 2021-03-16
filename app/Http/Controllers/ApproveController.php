<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApproveController extends Controller
{
    public function index()
    {
        return view('admin.approve.index');
    }
}
