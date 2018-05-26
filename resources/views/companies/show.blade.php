@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-lg-9 col-md-9 pull left">	
<div class="jumbotron">
        <h1>{{$company->name}}</h1>
        <p class="lead">{{$company->description}}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
</div>

<div class="row" style="background: white;">

      <div class="col-md-10">
        @foreach($company->projects as $project)
        <div class="col-md-4">
          <h2>{{$project->name}}</h2>
          <p class="text-danger">{{$project->description}}</p>
          <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View Project »</a></p>
               
        </div>
      @endforeach 
  </div>
  <div class="col-md-2">
    <a class="pull-right btn btn-success btn-sm" href="/projects/create">Create New Project</a>
  
</div>
</div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
	<div class="sidebar-module">
            <ol class="list-unstyled">
              <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
              <li>
                <li><a href="/projects/create">Add Project</a></li>
                <li><a href="/companies">My Companies</a></li>
              <li><a href="/company/create">Create New Company</a></li>
              <br>
              <li>
                <a href="#" 
                    onclick="
                    var result=confirm('Are you sure you wish to delete this Company?');
                        if(result){
                          event.preventDefault();
                          document.getElementById('delete-form').submit();
                        }
                          "

                >
                Delete
                </a>

                <form id="delete-form" action="{{route('companies.destroy',[$company->id])}}" method="post" style="display: none;">
                  <input type="hidden" name="_method" value="delete">
                  {{ csrf_field() }}
                </form>

              </li>

              
            </ol>
    </div>
          <!-- <div class="sidebar-module">
            <h4>Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div> -->
          
        </div>
</div>

@endsection