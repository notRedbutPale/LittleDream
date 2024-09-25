@extends('layout')

@section('title', 'Story Details')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/story_index.css') }}">
    </head>
    <div class="container">
        <div class="story-detail">
            <h1 class="text-center mb-4">{{ $story->title }}</h1>
            <div class="story-content">
                <p id="story-content">{{ $story->content }}</p>
                <a href="{{ route('story') }}"><button class="btn btn-primary mt-3">More Stories</button></a>

                {{-- Add YouTube video --}}
                @if($story->youtube_video_url)
                    <div class="youtube-video mt-4">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $story->youtube_video_url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('generate-speech').addEventListener('click', function() {
            fetch('{{ route('story.speech', ['id' => $story->id]) }}')
                .then(response => response.blob())
                .then(blob => {
                    const audioUrl = URL.createObjectURL(blob);
                    const audioPlayer = document.getElementById('audio-player');
                    audioPlayer.src = audioUrl;
                    audioPlayer.style.display = 'block'; // Show the audio player
                    audioPlayer.play();
                })
                .catch(error => {
                    console.error('Error generating speech:', error);
                });
        });
    </script>
@endpush

@push('styles')
    <style>
        /* Your existing styles */
    </style>
@endpush
