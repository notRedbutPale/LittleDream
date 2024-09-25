{{-- games.blade.php --}}
@extends('layout')

@section('content')
    <div class="game-options" style="text-align: center; margin-top: 50px;">
        <h1>Choose a Game</h1>

        <div style="margin-top: 20px;">
            <a href="{{ route('game.memory-game') }}" class="btn btn-primary" style="margin-right: 15px;">Memory Game</a>
            <a href="{{ route('game.tictactoe') }}" class="btn btn-success" style="margin-right: 15px;">Tic Tac Toe</a>
            <a href="{{ route('game.rock-paper-scissors') }}" class="btn btn-danger">Rock Paper Scissors</a>
        </div>
    </div>
@endsection
