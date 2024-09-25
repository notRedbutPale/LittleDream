@extends('layout')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/story_index.css') }}">
    </head>
    <div class="container">
        <h1 class="text-center my-4 custom-title">Select An Animal</h1>
        <ul class="list-group">
            @foreach($animals as $animal)
                <li class="list-group-item">
                    <a href="{{ route('animals.show', $animal) }}" class="text-decoration-none text-primary">{{ ucfirst($animal) }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
