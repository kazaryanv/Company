<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = new Company();
        return view("admin.company.company_panel", ['data' => $company->get()]);

    }

    public function create()
    {
        return view("admin.company.company_panel");
    }


    public function uploads(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'logo' => 'dimensions:min_width:100,min_height:100',
        ]);
        $path = $request->file('image')->store('logo', 'public');
        $store = Company::create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'logo' => $path,
            'website' => $request->website,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        if ($store) {
            return redirect()->route('company_panel')->with('success', 'Row successfully created');
        } else {
            return redirect()->route('company_panel')->with('fail', 'Fail!');
        }
    }


    public function show($id)
    {
        $company = new Company();
        return view('admin.company.one_company', ['company' => $company -> find($id)]);
    }

    public function edit($id)
    {
        $company = new Company();
        return view('admin.company.edit', ['company' => $company -> find($id)]);
    }


    public function update(Request $request, $id)
    {
        dd($request->logo);
        $users  = Company::find($id);

        $users->company_name                 = $request->input('company_name');
        $users->email                        = $request->input('email');
        $users->logo                         = $request->input('logo');
        $users->website                      = $request->input('website');


        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $request->logo->getClientOriginalExtension();
            $fileName = uniqid().'.'.$extension;
            $file->move(public_path().'/storage/',$fileName);
            $data = $fileName;
            $users->logo = $data;
        }
        $users->save();
        if($users) {
            return redirect()->route('company_panel')->with('success', 'Row successfully created');
        } else {
            return redirect()->route('company_panel')->with('fail', 'Fail!');
        }
    }


    public function destroy($id)
    {
        $delete =  Company::find($id);
        $file_name = $delete->logo;
        $file_path = public_path('storage/'.$file_name);
        unlink($file_path);
        $delete->delete();
        if($file_path) {
            return redirect()->route('company_panel')->with('success','Deleted successfully');
        } else {
            return redirect()->route('company_panel')->with('success','Deleted file');
        }
    }
}
