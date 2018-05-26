@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-lg-9 col-md-9 pull left">	
  <div class="row col-md-12 col-lg-12 col-sm-12" style="background: white;margin: 10px;">
      <form method="post" action="{{route('companies.update',[$company->id])}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">

        <div class="form-group">
          <label for="company-name">Name<span class="required">*</span></label>          
          <input type="text" name="name" placeholder="Enter Name" id="company-name" required="required" spellcheck="false" class="form-control" value="{{$company->name}}"/>
        </div>
        
       <div class="form-group">
          <label for="company-content">Description></label> 
          <textarea type="text" name="description" placeholder="Enter Description" id="company-content" spellcheck="false" class="form-control" style="resize: vertical" rows="5" value="{{$company->description}}">{{$company->description}}</textarea>
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
              <li><a href="/companies/{{$company->id}}/edit">Edit</a></li>
              <li><a href="/projects/create">Add Project</a></li>
              

              <br/>

              <li><a href="/companies/delete/{{$company->id}}">Delete</a></li>
          
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