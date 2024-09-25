
@extends('layout')

@section('content')
<head>
        <!-- Link to the custom CSS file -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    

    <h3>Your Thoughts</h3>

    <!-- Comment Form -->
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <textarea name="body" rows="5" required></textarea><br>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>

    <h4>Comments</h4>

    <!-- List of Comments -->
    @foreach($comments as $comment)
    <div class="comment-box">
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <small>{{ $comment->created_at->format('d M Y, H:i') }}</small>

        <!-- Reaction Buttons -->
        <div>
            <!-- Count Likes and Dislikes -->
            <span>{{ $comment->reactions->where('type', 'like')->count() }} Likes</span>
            <span>{{ $comment->reactions->where('type', 'dislike')->count() }} Dislikes</span>

            <!-- Like Button -->
            <form action="{{ route('reactions.store') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <input type="hidden" name="type" value="like">
                <button type="submit" class="btn-like"><i class="fa-solid fa-heart"></i></button>
            </form>

            <!-- Dislike Button -->
            <form action="{{ route('reactions.store') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <input type="hidden" name="type" value="dislike">
                <button type="submit" class="btn-dislike"><i class="fa-regular fa-heart"></i></button>
            </form>
        </div>

        <!-- Reply Button -->
        <button class="btn-link" onclick="document.getElementById('reply-form-{{ $comment->id }}').style.display = 'block';">Reply</button>

        <!-- Reply Form (Hidden initially) -->
        <div id="reply-form-{{ $comment->id }}" style="display:none; margin-top:10px;">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                <textarea name="body" rows="3" required></textarea><br>
                <button type="submit" class="btn btn-sm btn-primary">Post Reply</button>
            </form>
        </div>

        <!-- List of Replies -->
        @foreach($comment->replies as $reply)
        <div class="reply-box">
            <strong>{{ $reply->user->name }}</strong>
            <p>{{ $reply->body }}</p>
            <small>{{ $reply->created_at->format('d M Y, H:i') }}</small>
        </div>
        @endforeach
    </div>
    @endforeach
</head>
@endsection

