@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-lg-9 col-md-9 pull left"> 
<div class="well well-lg">
        <h1>{{$project->name}}</h1>
        <p class="lead">{{$project->description}}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
</div>

<div class="row col-md-12 col-lg-12 col-sm-12" style="background: white;margin: 10px;">
  <a href="/projects/create" class="pull-right btn btn-default btn-sm">Add Project</a>

<div class="row container-fluid">
  <form method="post" action="{{route('comments.store')}}">
        {{csrf_field()}}

        <input type="hidden" name="commentable_type" value="App\Project">
        <input type="hidden" name="commentable_id" value="{{$project->id}}">
              
       <div class="form-group">
          <label for="comment-content">Comment</label> 
          <textarea type="text" name="body" placeholder="Enter Comment" id="comment-content" spellcheck="false" class="form-control" style="resize: vertical" rows="3"></textarea>
        </div> 

         <div class="form-group">
          <label for="comment-content">Url/Photos of Work Done</label> 
          <textarea type="text" name="url" placeholder="Enter Url or Screenshots" id="comment-url" spellcheck="false" class="form-control" style="resize: vertical" rows="1"></textarea>
        </div> 

        <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Submit">
        </div>
      </form>
    </div>

   
      {{--<div class="col-lg-4 col-sm-4 col-md-4">
        <h2>{{$comment->body}}</h2>
        
        <p><a class="btn btn-success" href="/projects/{{$project->id}}" role="button"></a></p>
      </div>--}}
    
    @include('partials.comments');

</div>
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
  <div class="sidebar-module">
            <ol class="list-unstyled">
              <li><a href="/projects/{{$project->id}}/edit">Edit</a></li>
              <li>
                <li><a href="/projects/create">Add Project</a></li>
                <li><a href="/projects">My Projects</a></li>
              <li><a href="/project/create">Create New Company</a></li>
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

                <form id="delete-form" action="{{route('projects.destroy',[$project->id])}}" method="post" style="display: none;">
                  <input type="hidden" name="_method" value="delete">
                  {{ csrf_field() }}
                </form>

              </li>

              
            </ol>


            <br><br>

            <h4>Add Members</h4>
            <div class="row">    
              <div class="col-lg-12 col-sm-12 col-md-12">
                <form id="add-user" action="{{route('projects.adduser')}}" method="post">
                  {{ csrf_field() }}
                <div class="input-group">
                  <input type="hidden" class="form-control" value="{{$project->id}}" name="project_id">
                  <input type="text" class="form-control" placeholder="Email" name="email">

                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit">Add</button>
                  </span>
                </div><!-- /input-group -->
                </form>
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
          <br>
            <h4>Team Members</h4>
              <ol class="list-unstyled">
                @foreach($project->users as $user)
                <li><a href="#">{{$user->email}}</a></li>
                @endforeach
                
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