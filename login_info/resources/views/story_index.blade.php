@extends('layout')

@section('title', 'Story')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/story_index.css') }}">
    </head>
    <div class="container">
        <h1 class="text-center my-4 custom-title">Children's Stories and Poems</h1>
        <p class="text-center mb-4 custom-paragraph">Explore our magical collection of preloaded stories and poems for children. Click on a title to read more!</p>

        <div class="row">
            @foreach($stories as $story)
                <div class="col-md-4 mb-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $story->title }}</h5>
                            <a href="{{ route('story.show', ['id' => $story->id]) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

