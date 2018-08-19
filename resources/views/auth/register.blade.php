@extends('layouts.app')

@section('content')
    <h1>Register    <small><a href="{{ URL::route('login') }}">Sign in</a></small></h1>

    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach
    
    {{ Form::open() }}
        <div class="newUser">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="password_confirm" placeholder="Confirm Password">
            <input type="submit" value="Register">
        </div>
    {{ Form::close() }}
@endsection