@extends('layout')
@section('title', 'Forget Password')
@section('content')
<div class="container">
    <form action="{{ route('forget.password.post') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
    </form>
</div>
@endsection
