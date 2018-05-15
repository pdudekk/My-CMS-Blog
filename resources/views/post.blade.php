@extends('layouts.app')

@section('content')
    <h1>Make new post</h1>

    {!! Form::open(['url' => 'admin/submit']) !!}
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
    {!! Form::close() !!}
@endsection

