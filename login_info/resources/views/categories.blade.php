@extends('layout')

@section('title', 'Categories')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/story_index.css') }}">
    </head>
    <div class="container">
        <h1 class="text-center my-4 custom-title">Select a Quiz Category</h1>
        <div class="button-group d-flex flex-wrap justify-content-center"> {{-- Using Bootstrap flex classes --}}
            @foreach ($categories as $category)
                <div class="m-2">
                    <a href="{{ route('showQuiz', $category->id) }}" class="btn btn-primary">{{ ucfirst($category->name) }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
