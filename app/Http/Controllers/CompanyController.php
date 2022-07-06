<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use function Symfony\Component\HttpFoundation\filter;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view("admin.company.company_panel",compact('company'));

    }

    public function create()
    {
        return view("admin.company.edit");
    }


    public function store(CompanyRequest $request)
    {
            if ($request->hasFile('logo')){
                $path =$request->file('logo')->store('logo', 'public');
                $store = Company::create([
                    'company_name' => $request->company_name,
                    'email' => $request->email,
                    'logo' => $path,
                    'website' => $request->website,
                ]);
                if ($store){
                    return redirect()->route('companies.index')->with('success', 'Company created successfully');
                }else{
                    return redirect()->route(back())->with('fail', 'fail');
                }
            }else{
                $store = Company::create([
                    'company_name' => $request->company_name,
                    'email' => $request->email,
                    'website' => $request->website,
                ]);
                if ($store){
                    return redirect()->route('companies.index')->with('success', 'Company created successfully');
                }else{
                    return redirect()->route(back())->with('fail', 'fail');
                }
            }
    }


    public function show(Company $company)
    {
            return view('admin.company.one_company',['company'=> $company]);
    }

    public function edit(Company $company)
    {
        return view('admin.company.edit',['company'=> $company]);

    }


    public function update(CompanyRequest $request, $id)
    {
            $users = Company::query()->findOrFail($id);
            $users->company_name = $request->input('company_name');
            $users->email = $request->input('email');
            $users->email = $request->input('logo');
            $users->website = $request->input('website');

            if ($request->hasfile('logo')) {
                $file = $request->file('logo');
                $extension = $request->logo->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                $filepath = public_path('storage/'.$fileName);
                $file->move(public_path().'/storage/',$fileName);
                $data = $fileName;
                $users->logo = $data;
            }
            if ($users->save()) {
                return redirect()->route('companies.index')->with('success', 'Row successfully created');
            }else{
                return redirect()->route(back())->with('fail', 'fail');
            }
    }
    public function destroy($id)
    {
        $delete =  Company::query()->findOrFail($id);
        $file_name = $delete->logo;
        $file_path = public_path('storage/'.$file_name);
        unlink($file_path);
        $delete->delete();
        if($delete->delete()) {
            return redirect()->route('companies.index')->with('success','Deleted successfully');
        } else {
            return redirect()->route('companies.index')->with('success','Deleted file');
        }
    }
}
