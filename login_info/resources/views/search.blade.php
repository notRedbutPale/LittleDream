@extends('layout') 
@section('title', 'Search Page')

@section('content')
<div class="container search-container">
    <div class="search-box">
        <!-- Image at the top of the search box -->
        <img src="{{ asset('images/bun.png') }}" alt="Bun" class="bun-image">
        
        <h1 class="text-center">Search</h1>

        <form class="d-flex" method="GET" action="{{ route('search.results') }}">
            <input class="form-control me-2" type="search" name="query" placeholder="Search Movies or Poems..." aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</div>
@endsection



@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endpush
