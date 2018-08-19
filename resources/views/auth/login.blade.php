@extends('layouts.app')

@section('content')

    <h1>Sign in <small><a href="{{ URL::route('register') }}">Register</a></small></h1>
    @foreach ($errors->all() as $error)
        <p class="error">{{ $error }}</p>
    @endforeach
    {{ Form::open() }}
        <div class="login">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="Sign in">
        </div>
    {{ Form::close() }}
@endsection
