
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
              <div class="container">
                    <div class="col-md-8 col-lg-8">
                      <div class="page-header">

                        <h1> Comments :</h1>
                      </div>
                      <hr>
                      <div class="shadow-sm p-3 mb-5 bg-white rounded">
                @if(count($comments)>0)
                    @foreach($comments as $com)



                         <div class="media">
                              <div class="media-body">
                                <h4 class="media-heading user_name">{{$com->username}}
                                  
                                </h4>
                                  {{$com->comcontent}}

                              </div>
                            </div>
                            <hr>



                    @endforeach
                @endif
                  </div>
              </div>

        </div>


    <br>
    <br>
@endsection
