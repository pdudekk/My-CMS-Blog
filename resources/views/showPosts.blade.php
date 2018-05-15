@extends('layouts.app')

  @section('content')
  <div class="container">
    <h2>All posts:</h2>
  <table class="table">
    <tr>
      <th> Post ID </th>
      <th> Post title </th>
      <th> Edit </th>
    </tr>
    @if(count($data)>0)

        @foreach($data as $post)
          <tr>
            <th> {{$post->id}} </th>
            <th> <a href="{{ url('post',$post->id) }}"> {{$post->postname2}} </a> </th>
            <th> <a href="{{ url('admin/edit',$post->id) }}" class="btn btn-primary"> edit </a> </th>
          </tr>
        @endforeach
    @endif
    </table>
  </div>
  @endsection
