<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class AttendanceReportController extends Controller
{
    public function index(Employee $employee)
    {
        $employees = Employee::all();
        $employees = Employee::pluck('name','id');
        $id = 2;
        return view('admin.attendance.index', compact('id', 'employees'));
    }
}
