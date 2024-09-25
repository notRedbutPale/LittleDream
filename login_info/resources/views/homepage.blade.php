<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LittleDreamScape</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Use Laravel's asset function for linking CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-logo">
                <div class="logo border"></div>
            </div>
            <pre> LittleDreamScape</pre>
            <button class="search border"><a href="/">Home</a></button>
            <button class="search border"><a href="{{route('register')}}">Registration</a></button>
            <button class="search border"><a href="{{route('login')}}">Log In</a></button>
            <button class="search border">About Us</button>
        </div>
    </header>
        
    <div class="hero">
        <div class="hero-msg">
            <h4>Your imagination is your superpower. Let’s build, learn, and play together to unlock amazing possibilities!</h4>
        </div>
    </div>
    
    <div class="txt">
        <strong>Get started fast with our Amazing Features</strong>
        <button class="photos border"><i class="fa-solid fa-book"></i>Read Stories</button></a>
        <button class="photos border"><i class="fa-solid fa-headphones"></i>Narrate Poems</button>
        <button class="photos border"><i class="fa-solid fa-paw"></i>Know Animals</button>
        <button class="photos border"><i class="fa-solid fa-file-pen"></i>Quizzes</button>
        <button class="photos border"><i class="fa-solid fa-gamepad"></i>Offline Games</button>
    </div>

    <div class="box_section">
        <div class="box1 box">
            <div class="box-content">            
                    <h2>Book Store</h2>
                    <div class="box-img" style="background-image: url('{{ asset('images/one.avif') }}');"></div>
                    <p>Learn More</p>
                </a>
            </div>
        </div>
        <div class="box2 box">         
            <div class="box-content">
                    <h2>Rhyme Time</h2>
                    <div class="box-img" style="background-image: url('{{ asset('images/poem.avif') }}');"></div>
                    <p>Learn More</p>
                
            </div>
        </div>
        <div class="box3 box">         
            <div class="box-content">            
                <h2>Fun Quizz</h2>
                <div class="box-img" style="background-image: url('{{ asset('images/quiz.avif') }}');"></div>
                <p>Learn More</p>
            </div>
        </div>
        <div class="box4 box">
            <div class="box-content">            
                <h2>Offline Games</h2>
                <div class="box-img" style="background-image: url('{{ asset('images/game.avif') }}');"></div>
                <p>Learn More</p>
            </div>
        </div>
        <div class="box1 box">
            <div class="box-content">            
                <h2>Animal Kingdom</h2>
                <div class="box-img" style="background-image: url('{{ asset('images/animal.avif') }}');"></div>
                <p>Learn More</p>
            </div>
        </div>
       
    </div>

    <footer>
        <div class="foot-panel1">Back to Top</div>
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
</body>
</html>
