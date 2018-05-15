@extends('layouts.app')

@section('content')
    <h1>Sign in</h1>
    <form method="post" action="/login/submit">
        {{csrf_field() }}


        <div class="form-group">
            <label for="email" >Email:</label>
            <input type="text" class="form-control" id="emial" name="email" required>
        </div>

        <div class="form-group">
            <label for="password" >Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" >Login </button>
        </div>

    </form>

@endsection