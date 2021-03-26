<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Mandays;
use App\Attendance;
use App\User;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    public function index(User $user, Attendance $attendance, Mandays $mandays)
    {
        $attendances = Attendance::all();
        $mandays = Mandays::all();
        $users = User::all();
        $users = User::pluck('name','id');
        $id = 2;
        return view('admin.attendance.index', compact('id', 'users', 'mandays', 'attendances'));
    }
}
