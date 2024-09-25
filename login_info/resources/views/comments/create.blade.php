?php 

@extends('layout')

@section('content')
    <h1>Share Your Thoughts</h1>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <textarea name="body" rows="5" required></textarea><br>
        <button type="submit">Comment</button>
    </form>
@endsection
