@extends('layout')

@section('title', 'Story')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">Children's Stories and Poems</h1>
        <p class="text-center mb-4">Explore our magical collection of preloaded stories and poems for children. Click on a title to read more!</p>

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

@push('styles')
    <style>
        body {
            background-color: #f0f8ff;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            background-color: #fff5e6;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-title {
            font-size: 1.2rem;
            color: #ff6347;
        }
        .btn-primary {
            background-color: #ff6347;
            border-color: #ff6347;
        }
        .btn-primary:hover {
            background-color: #ee5a46;
            border-color: #ee5a46;
        }
    </style>
@endpush
