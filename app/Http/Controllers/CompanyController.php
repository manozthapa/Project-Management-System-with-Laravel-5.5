<?php

namespace App\Http\Controllers;

use Auth;
use App\Company;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class CompanyController extends Controller
{
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome(){
        return view('welcome');
    }

    public function index()
    {
       if(Auth::check()){
        $companies=Company::where('user_id',Auth::user()->id)->get();
        return view('companies.index',['companies'=>$companies]);
       }
       return view('auth.login');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $company=Company::create([
                'name'=>$request->input('name'),
                'description'=> $request->input('description'),
                'user_id'=>Auth::user()->id
            ]);

            if($company){
                return redirect()->route('companies.show',['company'=>$company->id])
                ->with('success','Company created Successfully');
            }
        }

        return back()->withInput()->with('error','Error creating new company');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // $company=Company::where('id',$company->id)->first();
        $company=Company::find($company->id);

        return view('companies.show',['company'=> $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company=Company::find($company->id);
        return view('companies.edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        /*$companyUpdate=Company::find($request['id']);
        $companyUpdate->name=$request['name'];
        $companyUpdate->description=$request['description'];
        $companyUpdate->save();
        return redirect('companies.show');*/
        $companyUpdate=Company::where('id',$company->id)
                ->update([
                        'description'=> $request->input('description'),
                        'name'=> $request->input('name')
                        
                ]);
        if($companyUpdate){
            return redirect()->route('companies.show',['company'=>$company->id])
            ->with('success','Company updated Successfully');
        }
        return back()->withInput();
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $findCompany=Company::find($company->id);
        if($findCompany->delete()){
            return redirect()->route('companies.index')
            ->with('success','Company Deleted Successfully');
        }
        return back()->withInput()->with('error','Company could not be deleted');
    }
}
