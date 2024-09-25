<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LittleDreamScape</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<header>
    <div class="navbar">
            <div class="nav-logo">
                <div class="logo border"></div>
            </div>
            <pre> LittleDreamScape</pre>
        <button class="search border"><a href="{{ route('search')}}">Search</a></button>
        <button class="search border"><a href="{{ route('watchlater.view') }}">Watch Later</a></button>
        <button class="search border"><a href="{{route('comments.index')}}">Share Your Thoughts?</a></button>
       
        

        <!-- Profile dropdown menu moved to the right -->
        <div class="dropdown profile-dropdown">
            <button class="dropbtn">Profile <i class="fa-solid fa-caret-down"></i></button>
            <div class="dropdown-content">
                <a href="{{ route('user.edit', auth()->user()->id) }}">Edit Profile</a>
                <a href="{{ route('logout') }}">Logout</a>
                <form action="{{ route('user.delete', auth()->user()->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="background:none;border:none;color:black;" onclick="return confirm('Are you sure you want to delete your account?')">Delete Profile</button>
                </form>
            </div>
        </div>
    </div>
</header>

<div class="hero">
    <div class="hero-msg">
        <h4>Your imagination is your superpower. Let’s build, learn, and play together to unlock amazing possibilities!</h4>
    </div>
</div>

<div class="txt">
    <strong>Get started fast with our Amazing Features</strong>
    
    <a href="{{ route('story') }}"><button class="photos border"><i class="fa-solid fa-book"></i>Read Stories</button></a>
    <a href="{{ route('poems.index') }}" ><button class="photos border"><i class="fa-solid fa-headphones"></i>Narrate Poems</button></a>
    <a href="{{ route('animals.index') }}"><button class="photos border"><i class="fa-solid fa-paw"></i>Know Animals</button></a>
    <a href="{{ route('categories') }}" ><button class="photos border"><i class="fa-solid fa-file-pen"></i>Quizzes</button></a>
    <a href="{{ route('games') }}"><button class="photos border"><i class="fa-solid fa-gamepad"></i>Offline Games</button></a>
</div>


<div class="box_section">
        <div class="box1 box">
            <div class="box-content">            
                <a href="{{ route('story') }}" class="box-content">
                    <h2>Stories</h2>
                    <div class="box-img" style="background-image: url('{{ asset('images/one.avif') }}');"></div>
                    <p>Learn More</p>
                </a>
            </div>
        </div>
        <div class="box2 box">         
            <div class="box-content">
                <a href="{{ route('poems.index') }}" class="box-content">    

                    <h2>Rhyme Time</h2>
                    <div class="box-img" style="background-image: url('{{ asset('images/poem.avif') }}');"></div>
                    <p>Learn More</p>
                
            </div>
        </div>
        <div class="box3 box">         
            <div class="box-content"> 
                <a href="{{ route('categories') }}" class="box-content">               
                <h2>Fun Quizz</h2>
                <div class="box-img" style="background-image: url('{{ asset('images/quiz.avif') }}');"></div>
                <p>Learn More</p>
            </div>
        </div>
        <div class="box4 box">
            <div class="box-content">  
                <a href="{{ route('games') }}" class="box-content">                
                <h2>Offline Games</h2>
                <div class="box-img" style="background-image: url('{{ asset('images/game.avif') }}');"></div>
                <p>Learn More</p>
            </div>
        </div>
        <div class="box1 box">
            <div class="box-content">
                <a href="{{ route('animals.index') }}">            
                <h2>Animal Kingdom</h2>
                <div class="box-img" style="background-image: url('{{ asset('images/animal.avif') }}');"></div>
                <p>Learn More</p>
            </div>
        </div>
       
    </div>


<footer>
    <a href="{{ route('profile') }}"> <div class="foot-panel1">Back to Top</div>
    <div class="foot-panel2">
        <!-- Your footer content -->
    </div>
    <div class="foot-panel3">
        <div class="logo"></div>
    </div>
    <div class="foot-panel4">
        <div class="pages">
            <a>Conditions of Use</a>
            <a>Privacy Notice</a>
            <a>Your Ads Privacy Choices</a>
        </div>
        <div class="copyright">
            © 1996-2024, LittleDreamscape, Inc. or its affiliates
        </div>
    </div>
</footer>

<style>
    /* Align the navbar to be a flex container */
    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        /* Retain the original background color */
    }

    /* Profile dropdown positioned to the right */
    .profile-dropdown {
        position: absolute;
        right: 20px;
        top: 10px;
    }

    /* Basic styling for the dropdown */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a, .dropdown-content button {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover, .dropdown-content button:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropbtn {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropbtn:hover {
        background-color: #3e8e41;
    }
</style>

</body>
</html>
