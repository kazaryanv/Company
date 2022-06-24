<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index() {
        $company = new Company();
        return view("admin.company.company_panel",['data' => $company->get()]);
    }

    public function create()
    {
        return view("admin.company.company_panel");
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('logo','public');
        $author = new Company();
        $store = $author->create([
            'company_name' => $request->company_name,
            'email' => $request->email,
            'logo'=> $path,
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
//        $author = new Company();
//        return view('authors/one_author', ['author' => $author->find($id)]);
    }

    public function edit($id)
    {
//        $author = new Company();
//        return view('authors/edit_author', ['author' => $author->find($id)]);
    }

    public function update(Request $request)
    {

    }

    public function delete($id)
    {

    }
}
