@extends('layout')

@section('title', 'Edit User Information')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/story_index.css') }}">
    </head>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Edit User Information</h2>

                <!-- Success message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Error messages -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Form styling -->
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="bg-light p-4 shadow-sm rounded">
                    @csrf
                    @method('PUT')

                    <!-- Full Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name:</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                    </div>

                    <!-- Change Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Change Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password">
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add additional styling for professional look -->
    <style>
        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 0.375rem;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .container {
            max-width: 600px;
        }

        .btn-close {
            color: inherit;
        }

        .alert-dismissible .btn-close {
            position: absolute;
            top: 0.75rem;
            right: 1rem;
        }
    </style>
@endsection
