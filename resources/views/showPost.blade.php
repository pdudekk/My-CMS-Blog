
@extends('layouts.app')

@section('content')

    @if(count($make_posts)>0)

        @foreach($make_posts as $post)
            <a href="{{ url('post',$post->id) }}">    <h2> {{$post->postname2}}    </h2></a>
            <p class="list-group-item"> {{$post->postcontent2}}</p>

            <br>


        @endforeach
    @endif


            <nav aria-label="Page navigation example">
                <ul class="pagination">

                    @if($posts_count>0)

                        @for($i=0 ; $i<$posts_count ; $i++)
                    <li class="page-item"><a class="page-link" href="{{ url('page',$i+1) }}">{{$i+1}}</a></li>
                        @endfor
                        @endif

                </ul>
            </nav>


@endsection
