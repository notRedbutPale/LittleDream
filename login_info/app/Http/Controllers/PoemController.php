<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Poem;

class PoemController extends Controller
{
    public function index()
    {
        $poems = Poem::all();
        return view('poem_index', compact('poems')); // Updated to use poem_index.blade.php
    }
    public function show($id)
{
    $poem = Poem::findOrFail($id);
    return view('poem_show', compact('poem'));
}

}
