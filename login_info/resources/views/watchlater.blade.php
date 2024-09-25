<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Later List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

@include('include.header')  

<div class="container mt-5">
    <h1 class="text-center">Your Watch Later List</h1>

    @if($watchlater->isEmpty())
        <p class="text-center">Your Watch Later list is empty.</p>
    @else
        <div class="row">
            @foreach($watchlater as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->item->name }}</h5>
                            <p class="card-text">Category: {{ $item->item->category }}</p>

                            <!-- Remove from Watch Later Button -->
                            <form method="POST" action="{{ route('watchlater.remove', $item->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
