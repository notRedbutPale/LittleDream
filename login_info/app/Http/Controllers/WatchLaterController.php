<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WatchLater;


class WatchLaterController extends Controller {
    public function add(Request $request) {
        WatchLater::firstOrCreate([
            'user_id' => auth()->id(),
            'item_id' => $request->item_id,
            'item_type' => $request->item_type
        ]);

        return redirect()->back()->with('success', 'Added to Watch Later!');
    }

    public function view() {
        // Get the items the user has added to the watchlater list
        $watchlater = WatchLater::where('user_id', auth()->id())->get();
    
        // Pass the watchlater items to the view
        return view('watchlater', [
            'watchlater' => $watchlater // Ensure this is passed to your view
        ]);
    }

    // Add this method to remove items from the watchlater list
    public function remove($id) {
        $watchLaterItem = WatchLater::where('id', $id)
                                    ->where('user_id', auth()->id())
                                    ->first();

        if ($watchLaterItem) {
            $watchLaterItem->delete();
        }

        return redirect()->back()->with('success', 'Removed from Watch Later!');
    }
    
    
    
    
}

