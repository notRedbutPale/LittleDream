<?php
namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        // Fetch all stories from the database
        $stories = Story::all();
        return view('story_index', compact('stories'));
    }

    public function show($id)
    {
        // Fetch the story by ID
        $story = Story::findOrFail($id);
        return view('story_show', ['story' => $story]);
    }
}
