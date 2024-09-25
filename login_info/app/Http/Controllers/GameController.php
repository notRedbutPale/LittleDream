<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function ticTacToe()
    {
        return view('games.tictactoe');
    }

    public function memoryGame() {
        return view('games.memory-game');
    }
  

    public function rockPaperScissors() {
        return view('games.rock-paper-scissors');
    }
    
}
