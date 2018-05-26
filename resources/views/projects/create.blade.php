@extends('layouts.app')

@section('content')

<div class="container">
<div class="col-lg-9 col-md-9 pull left">	
  <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white;margin: 10px;">
      <form method="post" action="{{route('projects.store')}}">
        {{csrf_field()}}
       
        <h1>Create New Project</h1>
        <div class="form-group">
          <label for="project-name">Name<span class="required">*</span></label>          
          <input type="text" name="name" placeholder="Enter Name" id="project-name" required="required" spellcheck="false" class="form-control" />
        </div>
        
        @if($companies == null){
        <input type="hidden" name="company_id" value="{{$company_id}}"/>
      }
      @endif

      @if($companies != null)
      <div class="form-group">
        <label for="company-content">Select Company</label>
        <select name="company_id" class="form-control">
          @foreach($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
          @endforeach
        </select>
        
      </div>
      @endif

       <div class="form-group">
          <label for="company-content">Description</label> 
          <textarea type="text" name="description" placeholder="Enter Description" id="company-content" spellcheck="false" class="form-control" style="resize: vertical" rows="5"></textarea>
        </div> 

        <div class="form-group">
          <label for="company-content">Duration</label> 
          <input type="text" name="days" placeholder="Enter Duration" id="company-content" spellcheck="false" class="form-control" style="resize: vertical">
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
        </div>
      </form>
  </div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
	<div class="sidebar-module">
      <h4>Action</h4>
            <ol class="list-unstyled">
              
              <li><a href="/projects">My Projects</a></li>
              

              <br/>

             
          
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