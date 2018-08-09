<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use DB;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::all();
    }

    public function show($id)
    {
        return Company::find($id);

    }

    public function showTree($id)
    {
        //return Company::find($id);

        $companies = DB::table('companies')
            ->where('id', '=', $id)
            ->orWhere('parent_company_id', '=', $id)
            ->get();

        return $companies;

    }

    public function store(Request $request)
    {
        return Company::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->update($request->all());

        return $company;
    }

    public function delete(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return 204;
    }



}
