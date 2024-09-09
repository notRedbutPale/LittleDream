@extends('layout')

@section('title', 'Log Page')

@section('content')
    @auth
        <h2>User Information</h2>
        <p><strong>Full Name:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

        <!-- Edit Button -->
        <a href="{{ route('user.edit', auth()->user()->id) }}" class="btn btn-primary">Edit</a>

        <!-- Remove Button -->
        <form action="{{ route('user.delete', auth()->user()->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Remove</button>
        </form>
    @else
        <p>You are not logged in.</p>
    @endauth
@endsection
