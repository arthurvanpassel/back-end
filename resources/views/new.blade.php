@extends('layouts.app')
    @section('content')
        <h2>Welcome {{ $user->username }}</h2>
        <h3><a href="{{ URL::route('logout') }}">Sign out</a></h3>
    </div>
    <div class="container" id="logged-in">
        <h1>Create New Task</h1>

        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        
        {{ Form::open() }}
            <div class="newTask">
                <input type="text" name="name" placeholder="The name of your task">
                <input type="date" name="due_date" value={{date("Y-m-d")}}>
                <textarea name="comments" rows="4" cols="30" placeholder="Add a comment"></textarea>
                <input type="submit" value="Create">
            </div>
        {{ Form::close() }}
    @endsection