<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\WatchLater; // Make sure to import the WatchLater model
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }

    public function results(Request $request)
    {
        $query = $request->input('query');

        // Implement search logic here
        $results = Item::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('category', 'LIKE', "%{$query}%")
                        ->get();

        // Get the watchlater items for the current user
        $watchlater = WatchLater::where('user_id', auth()->id())
                                ->pluck('item_id')
                                ->toArray();

        // Pass results and watchlater data to the view
        return view('results', [
            'results' => $results, 
            'query' => $query, 
            'watchlater' => $watchlater
        ]);
    }
}
