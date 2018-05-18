
@extends('layouts.app')

@section('content')

    @if(count($make_posts)>0)

        @foreach($make_posts as $post)
        <div class="shadow-sm p-3 mb-5 bg-white rounded">
            <a href="{{ url('post',$post->id) }}">    <h2> {{$post->postname2}}    </h2></a>
            <hr>
            <a href="{{ url('post',$post->id) }}"><img  src="{{Storage::url('images/post/'. $post->img)}}" class="img-main"></a>
            <hr>
            <p class=""> {{$post->postcontent2}}</p>

            <br>
        </div>

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
