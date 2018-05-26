<div class="row" style="padding-top:40px; ">
    <div class="col-md-12">
        
            <!-- Fluid width widget -->        
          <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-comment"></span> 
                        Recent Comments
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                       \
                       @foreach($comments as $comment)
                        <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{$comment->user->name}}
                                    <br>
                                    <small><i>
                                      <a>{{$comment->user->email}}</a><br>
                                        commented on {{$comment->user->created_at}}
                                      </i>
                                    </small>
                                </h4>
                                <p class="lead">
                                    {{$comment->body}}
                                </p>

                                <p class="text-primary">{{$comment->url}}</p>
                            </div>
                        </li>
                        @endforeach
                    
                    </ul>
                   
                </div>
            </div>
            <!-- End fluid width widget --> 
            
    </div>
  </div>