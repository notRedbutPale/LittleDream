@extends('layout')
@section('title', 'Poems')
@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/story_index.css') }}">
    </head>
    <div class="container">
        <h1 class="text-center my-4">Children's Poems</h1>
        <ul class="row">
            
            
            <div class="row">
            @foreach($poems as $poem)
                <div class="col-md-4 mb-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $poem->title }}</h5>
                            <a href="{{ route('poems.show', ['id' => $poem->id]) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </ul>
    </div>
@endsection
