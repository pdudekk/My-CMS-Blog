
@extends('layouts.app')

@section('content')

    @if(count($posts)>0)

        @foreach($posts as $post)
            <ul class="list-group">
                <li class="list-group-item"> {{$post->postname2}}</li>
                <li class="list-group-item">Email: {{$message->postcontent2}}</li>
            </ul>
            <br>

        @endforeach
    @endif

@endsection
