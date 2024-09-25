@extends('layout')

@section('title', 'User Panel')

@section('content')
    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-lg">
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h3 class="mb-0">User Information</h3>
                            <!-- Story and Quiz buttons added here -->
                            <div>
                                <a href="{{ route('story') }}" class="btn btn-light btn-sm">Story</a>
                                <a href="{{ route('categories') }}" class="btn btn-light btn-sm">Quiz</a>
                                <a href="{{ route('logout') }}" class="btn btn-light btn-sm ml-2">Logout</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h4 class="text-primary">{{ auth()->user()->name }}</h4>
                                <p class="text-muted">{{ auth()->user()->email }}</p>
                            </div>

                            <div class="d-flex justify-content-center mb-3">
                                <a href="{{ route('user.edit', auth()->user()->id) }}" class="btn btn-info btn-lg" target="_blank">Edit Profile</a>
                            </div>

                            <div class="d-flex justify-content-center">
                                <form action="{{ route('user.delete', auth()->user()->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-lg" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center">
            <p class="alert alert-warning">You are not logged in.</p>
        </div>
    @endauth
@endsection

@push('styles')
    <style>
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .btn-light {
            background-color: #f8f9fa;
            border: none;
            color: #007bff;
        }
        .btn-light:hover {
            background-color: #e2e6ea;
        }
        .btn-info {
            background-color: #f0ad4e; /* Yellowish color */
            border: none;
            color: #fff; /* White text */
        }
        .btn-info:hover {
            background-color: #ec971f; /* Darker yellowish color */
        }
        .btn-danger {
            background-color: #d9534f; /* Red color */
            border: none;
            color: #fff; /* White text */
        }
        .btn-danger:hover {
            background-color: #c9302c; /* Darker red color */
        }
        .text-primary {
            color: #007bff;
        }
        .text-muted {
            color: #6c757d;
        }
        .card-header .btn-light {
            margin-left: 10px;
        }
    </style>
@endpush
