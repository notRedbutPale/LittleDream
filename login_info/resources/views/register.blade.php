<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Navbar -->
    <header>
        <div class="navbar">
            <div class="nav-logo">
                <div class="logo border"></div>
            </div>
            <pre> LittleDreamScape</pre>
            <button class="search border"><a href="/">Home</a></button>
            <button class="search border"><a href="{{ route('login') }}">Log In</a></button>
            <button class="search border"><a href="{{ route('register') }}">Registration</a></button>
        </div>
    </header>

    <!-- Validation and Session Messages -->
    <div class="container mt-5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>

    <!-- Registration Form -->
    <div class="registration-container">
        <h2>Create Your Account</h2>
        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <!-- Username Input -->
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required aria-label="Enter your username">
            </div>

            <!-- Email Input -->
            <div class="input-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required aria-label="Enter your email">
            </div>

            <!-- Password Input -->
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required aria-label="Enter your password">
            </div>

            <!-- Confirm Password Input -->
            <div class="input-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" required aria-label="Confirm your password">
            </div>

            <!-- Registration Button -->
            <button type="submit" class="registration-btn">Register</button>
        </form>
    </div>

    <script>
        // Front-end validation example (for password matching)
        const form = document.querySelector('form');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm-password');

        form.addEventListener('submit', function (e) {
            if (password.value !== confirmPassword.value) {
                e.preventDefault();
                alert('Passwords do not match!');
            }
        });
    </script>
</body>
</html>
