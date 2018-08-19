@extends('layouts.app')
    
    @section('content')
        <h2>Welcome {{ $user->username }}</h2>
        <h3><a href="{{ URL::route('logout') }}">Sign out</a></h3>
    </div>
    <div class="container" id="logged-in">
        <h1>Edit Task</h1>

        @foreach ($errors->all() as $error)
            <p class="error">{{ $error }}</p>
        @endforeach
        
        {{ Form::open() }}
            <div class="editTask">
                <input type="text" name="name" value="{{ $item->name }}">
                <input type="date" name="due_date" value={{ $item->due_date }}>
                <textarea name="comments" rows="4" cols="30" >{{ $item->comments }}</textarea>
                <input type="submit" value="Edit">
            </div>
        {{ Form::close() }}
    @endsection