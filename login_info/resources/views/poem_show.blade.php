@extends('layout')
@section('title', 'Poem')
@section('content')
<head>
        <link rel="stylesheet" href="{{ asset('css/story_index.css') }}">
    </head>
    <style>
        .poem-content {
            white-space: pre-wrap; /* Preserves line breaks and spaces */
            font-style: italic; /* Italicize the poem text */
            line-height: 1; /* Adjust line height for readability */
            margin: 10px 0; /* Spacing around the poem */
            text-align: center; /* Center the text */
        }

        .poem-content > span {
            display: block; /* Each stanza as a block */
            margin-bottom: 10px; /* Spacing between stanzas */
        }
    </style>

    <div class="container">
        <h1 class="text-center my-4">{{ $poem->title }}</h1>
        <div class="poem-content">
            @foreach(explode("\n", $poem->content) as $line)
                <span>{{ nl2br(e($line)) }}</span>
            @endforeach
        </div>
        <a href="{{ route('poems.index') }}" class="btn btn-primary">Back to Poems</a>
    </div>
@endsection
