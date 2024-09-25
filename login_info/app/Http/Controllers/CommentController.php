<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        // Fetch all comments with their replies
        $comments = Comment::whereNull('parent_id')->with('replies', 'user')->latest()->get();
        
        // Load the comment form and the list of comments on the same page
        return view('comments.index', compact('comments'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'parent_id' => 'nullable|exists:comments,id', // This allows for nested replies
        ]);
    
        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id, // This is null for root comments, and has a value for replies
        ]);
    
        return back();
    }
}   