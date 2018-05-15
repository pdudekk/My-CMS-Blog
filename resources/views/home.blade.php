@extends('layouts.app')

@section('content')
    <h1>Hello Laravel</h1>

    @if(count($make_posts)>0)

        @foreach($make_posts as $post)



            <a href="{{ route('single.post', $post->postid2) }}">    <h2> {{$post->postname2}}    </h2></a>
               <p class="list-group-item"> {{$post->postcontent2}}</p>

            <br>

        @endforeach
        @endif
@endsection
