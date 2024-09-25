<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="css/style1.css"> 

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('profile') }}">{{ config('app.name') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ route('profile') }}"><i class="fa-solid fa-house" style="color: yellow;"></i> Home</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('search') }}"><i class="fa-solid fa-film" style="color: yellow;"></i> Movie</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('watchlater.view') }}"><i class="fa-regular fa-bookmark" style="color: yellow;"></i> Watch Later</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('comments.index') }}" class="nav-link"><i class="fa-regular fa-comment-dots" style="color: yellow;"></i> Share Your Thoughts</a>
                        </li>
                        
                    @endguest
                </ul>
                <span class="navbar-text">
                    @auth
                        Hello, {{ auth()->user()->name }}!
                    @else
                        Welcome to LittleDreamScape!
                    @endauth
                </span>
            </div>
        </div>
    </nav>

    <!-- Rest of the page content -->
</body>
</html>
