
@extends('layouts.app')

@section('content')

<div class="p-3 mb-2 bg-warning text-dark">
  <h1>WARNING </h1><h3> This post will be deleted. <br> are You sure?</h3 >
</div>

<a href="{{ url('admin/delete',$post->id) }}" class="btn btn-danger" role="button">Yes delete!</a>
<a href="/admin/dontDelete" class="btn btn-success" role="button">Don't delete!</a>
<hr>
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


    <br>
    <br>
@endsection
