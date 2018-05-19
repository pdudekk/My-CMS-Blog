
@extends('layouts.app')

@section('content')



<div class="shadow-sm p-3 mb-5 bg-white rounded">
     <h2> {{$post->postname2}}    </h2>
     <hr>
    <img  src="{{Storage::url('images/post/'. $post->img)}}" class="img-main">
    <hr>
    <p class=""> {{$post->postcontent2}}</p>

    <br>
</div>
            <div class="container">
                  <div class="col-md-8 col-lg-8">
                    <div class="page-header">

                      <h1> Comments :</h1>
                    </div>
                    <hr>
                    <div class="shadow-sm p-3 mb-5 bg-white rounded">
              @if(count($comments)>0)
                  @foreach($comments as $com)



                       <div class="media">
                            <div class="media-body">
                              <h4 class="media-heading user_name">{{$com->username}}
                                @if(Auth::guard('admin')->check())

                                <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-comid="{{$com->id}}" data-comcontent="{{$com->comcontent}}" data-comusername="{{$com->username}}" data-target="#delete">
                                  Delete
                                </button>

                                @endif
                              </h4>
                                {{$com->comcontent}}

                            </div>
                          </div>
                          <hr>



                  @endforeach
              @endif
                </div>
            </div>

      </div>
                <br>
              @if(Auth::guard('web')->check() || Auth::guard('admin')->check())

              {!! Form::open(['url' => 'comment/post']) !!}

              <div class="form-group">

                  {{Form::label('Message', 'Send comment : ')}}
                  {{Form::text('id', $post->id, ['class'=> 'invisible'])}}
                  @if(Auth::guard('web')->check())

                    {{Form::text('user', Auth::guard('web')->User()->name, ['class'=> 'invisible'])}}

                  @elseif(Auth::guard('admin')->check())
                    {{Form::text('user', Auth::guard('admin')->User()->name, ['class'=> 'invisible'])}}
                  @endif
                   <textarea class="form-control" name="Message" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div>
                  {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
              </div>
              {!! Form::close() !!}

              @else

                  <a href="/login" class="btn btn-primary">Login to send comment</a>

              @endif

    <br>
    <br>



    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
          </div>

          		{{method_field('delete')}}
          		{{csrf_field()}}
    	      <div class="modal-body">
    				<p class="text-center">
    					Are you sure you want to delete this?
    				</p>
            <div class="comments-list shadow-sm p-3 mb-5 bg-white rounded">
                <div class="media">
                     <div class="media-body">
                       <h4 id="com_username" class="media-heading user_name"></h4>
                         <p id="com_content"></p>
                     </div>
                   </div>

            </div>

    	      </div>
    	      <div class="modal-footer">

              <form method="post" action="/admin/deleteComment">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="com_id" class="form-control" id="com_id" value="">

    	        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
    	        <button type="submit" class="btn btn-danger">Yes, Delete</button>

              </form>

    	      </div>

        </div>
      </div>
    </div>

@if(Auth::guard('admin')->check())
    <script>
        $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var modal = $(this);
        var com_id = button.attr('data-comid');
        var com_content = button.attr('data-comcontent');
        var com_username = button.attr('data-comusername');

        modal.find('#com_id').val(com_id);
        modal.find('#com_content').text(com_content);
        modal.find('#com_username').text(com_username);

    });
    </script>
  @endif

@endsection
