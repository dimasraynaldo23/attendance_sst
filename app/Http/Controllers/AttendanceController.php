<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Attendance $attendance, Employee $employee)
    {
        $attendances = Attendance::all();
        $employees = Employee::all();
        $employees = Employee::pluck('name','id');
        $id = 2;
        return view('admin.attendance.index', compact('attendances','id', 'employees'));
    }
}
