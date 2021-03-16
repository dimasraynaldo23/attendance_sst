<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee; //menghungkan ke model
use App\Position;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index()
    {
        // $employee = DB::table('employees')->get();
        $employees = Employee::all();
        return view('admin.employee.index', ['employees' => $employees]); //nama variabel dan data, karena sama bisa dijadikan compact('employees')  
    }

    public function create(Employee $employee, Position $position) 
    {
        $positions = Position::all();
        $positions = Position::pluck('position','id_position');
        $id_position = 2;
        return view('admin.employee.create', compact('employee','id_position', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'nik' => 'required|unique:employees',
                'email' => 'required|email|unique:employees',
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

            return redirect('/employee')->with('status','Employee data has been successfully added!');
    }

    public function edit(Employee $employee)
    {
        $positions = Position::all();
        $positions = Position::pluck('position','id_position');
        $id_position = 2;
        return view('admin.employee.edit', compact('employee','id_position', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate(
           [
               'name' => 'required',
               'nik' => 'required',
               'email' => 'required|email',
               'position' => 'required',
               'avatar' => 'required'
            ]);

        $employee_id = $employee->id;
        $employee = Employee::findOrFail($employee_id);

        $employee->name = $request->input('name');
        $employee->nik = $request->input('nik');
        $employee->email = $request->input('email');
        $employee->position = $request->input('position');

        if($request->hasfile('avatar'))
        {
            $destination = 'uploads/employee/'.$employee->avatar;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =  time() . '.' . $extension;
            $file->move('uploads/employee/', $filename);
            $employee->avatar = $filename;
        }

        $employee->update();
        return redirect('/employee')->with('status','Employee data updated!');
    }

    public function destroy(Employee $employee)
    {
        Employee::destroy($employee->id);
        return redirect('/employee')->with('status','Employee data has been successfully deleted!');
    }
}
