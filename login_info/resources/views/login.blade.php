<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <!-- Header -->
    <header>
        <div class="navbar">
            <div class="nav-logo">
                <div class="logo border"></div>
            </div>
            <pre>LittleDreamScape</pre>
            <button class="search border"><a href="/">Home</a></button>
            <button class="search border"><a href="{{ route('register') }}">Registration</a></button>
            <button class="search border"><a href="{{ route('login') }}">Log In</a></button>
            <button class="search border">Help & Support</button>
        </div>
    </header>

    <div class="signin-container">
    <h2>Sign In</h2>

    <!-- Validation errors -->
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <!-- Error and success messages -->
    @if(session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Login Form -->
    <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <label for="email">Email:</label>
            <input type="email" id="email" class="form-control" name="email" required>
        </div>

        <div class="input-group mb-3">
            <label for="password">Password:</label>
            <input type="password" id="password" class="form-control" name="password" required>
            <button type="button" class="show-password btn btn-secondary" onclick="togglePassword()">Show Password</button>
        </div>

        <button type="submit" class="btn btn-primary sign-in-btn">Sign In</button>

        <div class="forgot-password mt-3">
            <a href="{{ route('forget.password') }}">Forgot Password?</a>
        </div>
    </form>
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>


</body>
</html>
