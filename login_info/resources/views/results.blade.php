<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .search-title {
            text-align: center;
            color: #343a40;
            margin-bottom: 30px;
        }
        .result-item {
            padding: 20px;
            margin-bottom: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .result-item h5 {
            color: #007bff;
        }
        .no-results {
            text-align: center;
            font-size: 18px;
            color: #dc3545;
            margin-top: 30px;
        }
    </style>
</head>
<body>


@include('include.header')  

@php
    $query = $query ?? ''; // This will set $query to an empty string if it's not defined
@endphp


<div class="container">
    <h1 class="search-title">Search Results</h1>

    @if(isset($results) && count($results) > 0)
        <div class="row">
            @foreach($results as $result)
                <div class="col-md-4">
                    <div class="card result-item">
                        <div class="card-body">
                            <h5 class="card-title">{{ $result->name }}</h5>
                            <p class="card-text">{{ $result->category }}</p>

                            @if(in_array($result->id, $watchlater))
                                <!-- Show "Added" button if the item is already in Watch Later -->
                                <button class="btn btn-success" disabled>Added</button>
                            @else
                                <!-- Show "Add to Watch Later" button if the item is not in Watch Later -->
                                <form method="POST" action="{{ route('watchlater.add') }}" style="display: inline;">
                                    @csrf
                                    <input type="hidden" name="item_id" value="{{ $result->id }}">
                                    <input type="hidden" name="item_type" value="movie">
                                    <button type="submit" class="btn btn-primary">Add to Watch Later</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-results">
            <p>No results found for "{{ $query }}"</p>
        </div>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
