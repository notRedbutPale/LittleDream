@extends('layout')

@section('content')
    <head>
        <link rel="stylesheet" href="{{ asset('css/story_index.css') }}">
    </head>
<div class="container">
    <h1>Fun Facts About {{ ucfirst($animal) }}</h1>

    <ul>
        @foreach($facts as $fact)
        <li>{{ $fact }}</li>
        @endforeach
    </ul>
    @if($animal =='lion')
    <p><bold>Watch Videos About Lions</bold><p>
    <div class="video-container">
    <iframe width="600" height="315" src="https://www.youtube.com/embed/OMkEVX23BdM?si=QsmHEzuA7NWsBcU1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    @endif
    @if($animal =='tiger')
    <p><bold>Watch Videos About tiger</bold><p>
    <div class="video-container"><iframe width="600" height="315" src="https://www.youtube.com/embed/FK3dav4bA4s?si=R895w64Cl2mD88Gn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div>
    @endif
    <a href="{{ route('animals.index') }}">Back to Animals</a>
</div>
@endsection
