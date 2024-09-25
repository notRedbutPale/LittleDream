<?php

namespace App\Http\Controllers;

use App\Models\Story; 
use App\Services\VoiceRssService; // Ensure this is correctly imported
use Illuminate\Http\Request;

class StoryController extends Controller
{
    protected $voiceRssService;

    // Inject VoiceRssService into the controller
    public function __construct(VoiceRssService $voiceRssService)
    {
        $this->voiceRssService = $voiceRssService;
    }

    // List all stories
    public function index()
    {
        $stories = Story::all(); 
        return view('story_index', compact('stories'));
    }

    // Display a single story
    public function show($id)
    {
        $story = Story::find($id);

        if (!$story) {
            return redirect()->route('story.index')->with('error', 'Story not found');
        }

        return view('story_show', compact('story'));
    }

    public function generateSpeech($id)
    {
        $story = Story::find($id);
        
        if (!$story) {
            return redirect()->route('story.index')->with('error', 'Story not found');
        }
        
        try {
            // Use the VoiceRssService to convert the story content to speech
            $audioContent = $this->voiceRssService->convertTextToSpeech($story->content);
            
            // Log the generated audio content (you might want to log only a small part or metadata)
            Log::info('Generated audio content length: ', ['length' => strlen($audioContent)]);
            
        } catch (\Exception $e) {
            // Log or display error details
            return response()->json(['error' => 'Failed to generate speech: ' . $e->getMessage()], 500);
        }
        
        // Return the audio content to the browser
        return response($audioContent, 200)
            ->header('Content-Type', 'audio/mpeg');
    }
    
}
