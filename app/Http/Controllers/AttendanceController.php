<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Mandays;
use App\Attendance;
use App\Project;
use Illuminate\Http\Request;


class AttendanceController extends Controller
{
    public function index(Project $project)
    {
        $projects = Project::all();
        return view('user.dashboard.index', compact('projects'));
    }

    public function storeAbsent(Request $request)
    {
        $request->validate([
            'noteAbsent' => 'required'
        ]);

        $attendance = new Attendance();
        
        $attendance->nik = Auth::user()->nik;
        $attendance->present = '0';
        $attendance->absent = '1';
        $attendance->note = $request->input('noteAbsent');
        
        $attendance->save();
        
        return redirect()->back()->with('success','Absent saved!');
    }
    
    public function storePresent(Request $request)
    {
        $attendance = new Attendance();        
        $attendance->nik = Auth::user()->nik;
        $attendance->present = '1';
        $attendance->absent = '0';
        $attendance->note = $request->input('notePresent');
        $attendance->save();


        for ($i=0; $i < count((array)$request->project_code); $i++) { 
            $mandays = new Mandays();
            $mandays->nik = Auth::user()->nik;
            $mandays->project_code = $request->project_code[$i];
            $mandays->start_time = $request->start_time[$i];
            $mandays->end_time = $request->end_time[$i];
            $mandays->save();
        };
        
        return redirect()->back()->with('success','Present saved!');

    }
}
