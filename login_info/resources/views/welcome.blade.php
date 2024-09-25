@extends('layout')

@section('title', 'Homepage')

@section('content')
    @auth
        <p>Welcome, <a href="{{ route('logpage') }}">{{ auth()->user()->name }}</a>!</p>
    @else
        <p>You are not logged in.</p>
    @endauth
@endsection
