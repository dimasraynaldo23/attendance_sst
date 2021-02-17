<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkStatusController extends Controller
{
    public function index()
    {
        return view('admin.work_status.index');
    }
}
