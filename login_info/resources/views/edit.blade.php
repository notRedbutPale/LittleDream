@extends('layout')

@section('title', 'Edit User Information')

@section('content')
    <h2>Edit User Information</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Add CSS directly in the Blade file -->
    <style>
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .form-group label {
            min-width: 120px;
            text-align: right;
            margin-right: 10px;
        }

        .form-group input {
            flex: 1;
        }
    </style>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Full Name Field -->
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
        </div>

        <!-- Change Password Field -->
        <div class="form-group">
            <label for="password">Change Password:</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
        </div>

        <!-- Confirm Password Field -->
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm new password">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
