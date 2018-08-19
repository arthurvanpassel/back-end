@extends('layouts.app')
        
    @section('content')
        <h2>Welcome {{ $user->username }}</h2>
        <h3><a href="{{ URL::route('logout') }}">Sign out</a></h3>
    </div>
    <div class="container" id="logged-in">
        <h1>Your Done Items</h1>
        <ul>
            @foreach ($items as $item)
            @if ($item->deleted==false)
            @if ($item->done==true)
                <li>
                    {{ Form::open() }}
                        <input 
                            type="checkbox" 
                            onClick="this.form.submit()"
                            {{ $item->done ? 'checked' : '' }}
                        />

                        <input type="hidden" name="id" value="{{ $item->id }}" />
                        {{ e($item->name) }} <small><a href="{{ URL::route('delete', $item->id) }}">(x)</a></small>
                        <p class={{ $item->due_date > date("Y-m-d", strtotime("yesterday")) ? '' : 'late' }}>Due {{ date("d-m-Y", strtotime($item->due_date)) }}</p>
                    {{ Form::close() }}
                </li>
            @endif
            @endif
            @endforeach
        </ul>
    @endsection
