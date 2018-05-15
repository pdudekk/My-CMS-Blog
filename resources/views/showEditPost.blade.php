@extends('layouts.app')

@section('content')
<h2> Edit post: </h2>


      {!! Form::open(['url' => 'editPost/submit']) !!}
      <div class="form-group">
          {{Form::label('title', 'Title')}}
          {{Form::text('title', $post->postname2, ['class' => 'form-control'])}}
      </div>
      <div class="form-group">
          {{Form::label('Content', 'Content')}}
          {{Form::textarea('Content', $post->postcontent2, ['class' => 'form-control'])}}
      </div>
      <div>
          {{Form::submit('Edit Post', ['class' => 'btn btn-primary'])}}
      </div>
      {!! Form::close() !!}
@endsection
