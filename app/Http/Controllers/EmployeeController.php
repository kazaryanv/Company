<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employee::with('company')->simplePaginate(10);
        return view('admin.employee.employee', ['employee' => $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.employee.new_employee");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|nullable',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'nullable',
            'phone_number' => 'required',
        ]);
        $store = Employee::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        if ($store) {
            return redirect()->route('employee.index')->with('success', 'Row successfully created');
        } else {
            return redirect()->route('employee.index')->with('fail', 'Fail!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.one-employee',['employee'=> $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('admin.employee.new_employee', ['employee' => $employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $update = $employee ->update($request->all());
        if($update)
            return redirect()->route('employee.index')->with('success', 'update successfully created!');
        return back()->with('fail', 'Fail!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $delete = $employee->delete();
        if($delete) {
            return redirect()->route('employee.index')->with('success', 'deleted successfully created!');
        } else {
            return back()->with('fail', 'Fail!');
        }
    }
}
