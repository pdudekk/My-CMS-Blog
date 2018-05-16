
@extends('layouts.app')

@section('content')


              <h2> {{$post->postname2}}    </h2>
            <p class="list-group-item"> {{$post->postcontent2}}</p>
              <br>
        <h3>Comments :</h3>
              <br>
              @if(count($comments)>0)
                  @foreach($comments as $com)
                 <ul class="list-group">
                     <li class="list-group-item list-group-item-primary">
                         <strong>{{$com->username}}</strong>
                     </li>
                     <li class="list-group-item list-group-item-info">
                      {{$com->comcontent}}
                     </li>
                 </ul>
                  @endforeach
              @endif
                <br>
              @if(Auth::guard('web')->check() || Auth::guard('admin')->check())

              {!! Form::open(['url' => 'comment/post']) !!}

              <div class="form-group">

                  {{Form::label('Message', 'Send comment : ')}}
                  {{Form::text('id', $post->id, ['class'=> 'invisible'])}}
                  @if(Auth::guard('web')->check())

                    {{Form::text('user', Auth::guard('web')->User()->name, ['class'=> 'form-control'])}}

                  @elseif(Auth::guard('admin')->check())
                    {{Form::text('user', Auth::guard('admin')->User()->name, ['class'=> 'form-control'])}}
                  @endif
                  {{Form::textarea('Message', '', ['class' => 'form-control'])}}
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
@endsection
