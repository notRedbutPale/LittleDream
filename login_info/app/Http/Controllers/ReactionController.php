<?php
namespace App\Http\Controllers;

use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|exists:comments,id',
            'type' => 'required|string|in:like,dislike',
        ]);

        // Check if the user has already reacted to this comment
        $existingReaction = Reaction::where('user_id', Auth::id())
                                    ->where('comment_id', $request->comment_id)
                                    ->first();

        if ($existingReaction) {
            // Update the existing reaction if it's different from the new one
            if ($existingReaction->type !== $request->type) {
                $existingReaction->update(['type' => $request->type]);
            }
        } else {
            // Create a new reaction (either like or dislike)
            Reaction::create([
                'type' => $request->type,
                'user_id' => Auth::id(),
                'comment_id' => $request->comment_id,
            ]);
        }

        return back();
    }
}
