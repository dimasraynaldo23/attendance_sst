<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee; //menghungkan ke model

class EmployeeController extends Controller
{
    public function index()
    {
        // $employee = DB::table('employees')->get();
        $employees = Employee::all();
        return view('admin.employee.index', ['employees' => $employees]); //nama variabel dan data, karena sama bisa dijadikan compact('employees')  
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'nik' => 'required',
                'email' => 'required',
                'position' => 'required',
                'avatar' => 'required'
            ]);
            
            $employee = new Employee();

            $employee->name = $request->input('name');
            $employee->nik  = $request->input('nik');
            $employee->email = $request->input('email');
            $employee->position = $request->input('position');

            if($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/employee/', $filename);
                $employee->avatar = $filename;
            } else {
                return $request;
                $employee->avatar = '';
            }

            $employee->save();

            return redirect('employee')->with('employee', $employee);
    }

    public function edit()
    {
        return view('admin.employee.edit');
    }
}
