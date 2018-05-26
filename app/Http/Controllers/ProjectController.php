<?php
namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\Company;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::check()){
            $projects = Project::where('user_id',Auth::user()->id)->get();
            return view('projects.index',['projects'=>$projects]);
        }
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     *

     */
    public function adduser(Request $request)
        //add user to project
    {
        $project = Project::find($request->input('project_id'));

        if(Auth::user()->id==$project->user_id){

        $user = User::where('email',$request->input('email'))->first();
        
        if($user && $project){
            $project->users()->attach($user->id);
            
            return redirect()->route('projects.show',['project'=> $project->id])
            ->with('success',$request->input('email').' was added to project successfully');
        }
    }

        return redirect()->route('projects.show',['project'=> $project->id])
    ->with('error','Error adding user to project');

    }


    public function create($company_id=null)

    {

        $companies=null;
        if(!$company_id){
            $companies=Company::where('user_id',Auth::user()->id)->get();
        }
            
        return view('projects.create',['company_id'=>$company_id,'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if (Auth::check()) {
            $project=Project::create([
                'name'=>$request->input('name'),
                'description'=>$request->input('description'),
                'company_id'=>$request->input('company_id'),
                'days'=>$request->input('days'),
                'user_id'=>Auth::user()->id,
            ]);

            if($project){
                return redirect()->route('projects.show',['project'=>$project->id])
                ->with('success','Project Created Successfully');
            }
        }
        return back()->withInput()->with('error','Error creating new Project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // $project=Company::find($company->id);

        // return view('companies.show',['company'=> $company]);

        $project=Project::find($project->id);

        $comments = $project->comments;

        return view('projects.show',['project'=>$project,'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        /*$company=Company::find($company->id);
        return view('companies.edit',['company'=>$company]);*/

        $project=Project::find($project->id);
        return view('projects.edit',['project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        /*$companyUpdate=Company::where('id',$company->id)
                ->update([
                        'description'=> $request->input('description'),
                        'name'=> $request->input('name')
                        
                ]);
        if($companyUpdate){
            return redirect()->route('companies.show',['company'=>$company->id])
            ->with('success','Company updated Successfully');
        }
        return back()->withInput();*/

        $projectUpdate=Project::where('id',$project->id)
            ->update([
                'name'=>$request->input('name'),
                'description'=>$request->input('description')
            ]);

            if($projectUpdate){
                return redirect()->route('projects.show',['project'=>$project->id])
                ->with('success','Project Updated Successfully');
            }

            return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        /*$findCompany=Company::find($company->id);
        if($findCompany->delete()){
            return redirect()->route('companies.index')
            ->with('success','Company Deleted Successfully');
        }
        return back()->withInput()->with('error','Company could not be deleted');*/

        $findProject=Project::find($project->id);
        if($findProject->delete()){
            return redirect()->route('projects.index')
            ->with('success','Project Deleted successfully');
        }
        return back()->withInput()->with('error','Unable Delete Project');
    }
}
