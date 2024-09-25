<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','WELCOME')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
        }
        .category-button {
            display: block;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            margin-bottom: 15px;
        }
        .quiz-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
  </head>
  <body>
   @include("include.header")
   <div class="container">
       @yield("content")
   </div>
  
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
