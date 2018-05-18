@extends('layouts.app')

@section('content')
    <h1>Make new post</h1>
    <hr>
    <form method="post" action="/admin/submit" enctype="multipart/form-data">
    

    <div class="form-group">
        <input type="file" name="image" id="file" class="form-control-file" >
    </div>
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', '', ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('Content', 'Content')}}
        {{Form::textarea('Content', '', ['class' => 'form-control'])}}
    </div>
    <div>
        {{Form::submit('Add Post', ['class' => 'btn btn-primary'])}}
    </div>
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>
@endsection
