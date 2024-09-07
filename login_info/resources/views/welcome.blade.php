@extends('layout')

@section('title', 'Homepage')

@section('content')
    @auth
        <p>Welcome, {{ auth()->user()->name }}!</p>
    @else
        <p>You are not logged in.</p>
    @endauth
@endsection
