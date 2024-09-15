@extends('layout')

@section('title', 'Story Details')

@section('content')
    <div class="container">
        <div class="story-detail">
            <h1 class="text-center mb-4">{{ $story->title }}</h1>
            <div class="story-content">
                <p>{{ $story->content }}</p>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        body {
            background-image: url('C:\Users\sarwa\Downloads\hand-drawn-world-book-day-background_23-2149309214.avif'); /* URL to your background image */
            background-size: cover; /* Scale the image to cover the whole page */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent repeating the image */
            font-family: 'Comic Sans MS', cursive, sans-serif;
            color: #333;
        }
        .container {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff; /* White background for content area */
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .story-detail {
            padding: 20px;
            border-radius: 10px;
            background-color: #fff5e6; /* Soft background color for the story area */
        }
        h1 {
            color: #ff6347; /* Bright color for headings */
            font-size: 2rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555; /* Slightly darker color for text */
        }
    </style>
@endpush
