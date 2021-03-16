<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attendance;
use App\Project;

class UserController extends Controller
{
    public function index(Attendance $attendance, Project $project)
    {
        $projects = Project::all();
        $projects = Project::pluck('name','id_project');
        $id_project = 2;
        return view('user.dashboard.index', compact('attendance','id_project', 'projects'));
    }
}
