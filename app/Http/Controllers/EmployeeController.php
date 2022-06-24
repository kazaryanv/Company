<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function logo() {
        $data = DB::table("employees")
            ->join("companies", "employees.company_id", "=", "companies.id")
            ->select("employees.name", "employees.id","employees.surname", "employees.email","companies.logo")->get();
        return view('admin.employee.employee', compact('data'));
    }
    public function index() {
//        $employe = DB::table('employees')->simplePaginate(10);
//        return view("admin.employee.employee",['data' => $employe]);
        $employe = DB::table('employees')->simplePaginate(2);
        return view('admin.employee.employee', ['data' => $employe ]);
    }

    public function create()
    {
        return view("admin.employee.employee");
    }

    public function store(Request $request)
    {
        $employee = new Employee();
        $store = $employee->create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email'=> $request->email,
            'phone_number' => $request->phone_number,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        if ($store) {
            return redirect()->route('employee')->with('success', 'Row successfully created');
        } else {
            return redirect()->route('employee')->with('fail', 'Fail!');
        }
    }
    public function show($id)
    {
        $employee = new Employee();
        return view('admin.employee.one-employee', ['employee' => $employee->find($id)]);
    }

    public function edit($id)
    {
        $employee = new Employee();
        return view('admin.employee.edit-employee', ['employee' => $employee->find($id)]);
    }

    public function update(Request $request)
    {
        $employee = new Employee();
        $updated_author = $employee->find($request->id);
        $updating = $updated_author->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email'=> $request['email'],
            'phone_number' => $request->phone_number,
            'updated_at' => NOW()
        ]);
        if ($updating) {
            return redirect()->route('employee')->with('success', 'Row successfully created');
        } else {
            return 'Update fail!';
        }
    }

    public function delete($id)
    {
        $author = new Employee();
        $delete_author = $author->find($id);
        $deleting = $delete_author->delete();
        if ($deleting) {
            return redirect()->route('employee')->with('success', 'Row successfully created');
        } else {
            return 'Update fail!';
        }
    }


}
