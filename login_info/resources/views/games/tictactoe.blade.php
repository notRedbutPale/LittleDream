<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tic-Tac-Toe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        h1 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #333;
        }

        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px);
            grid-template-rows: repeat(3, 100px);
            gap: 10px;
            margin-bottom: 20px;
        }

        .cell {
            width: 100px;
            height: 100px;
            border: 3px solid #333;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3em;
            font-weight: bold;
            background-color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .cell:hover {
            background-color: #f0f0f0;
        }

        .hidden {
            display: none;
        }

        .message {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
        }

        #restart {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #restart:hover {
            background-color: #555;
        }

        #restart.hidden {
            display: none;
        }
    </style>
</head>

<body>

 

    <h1>Tic-Tac-Toe (vs Computer)</h1>

    <div class="board" id="board">
        <div class="cell" data-index="0"></div>
        <div class="cell" data-index="1"></div>
        <div class="cell" data-index="2"></div>
        <div class="cell" data-index="3"></div>
        <div class="cell" data-index="4"></div>
        <div class="cell" data-index="5"></div>
        <div class="cell" data-index="6"></div>
        <div class="cell" data-index="7"></div>
        <div class="cell" data-index="8"></div>
    </div>

    <p class="message" id="message"></p>
    
    <button id="restart" class="hidden">Restart Game</button>

    <script>
        const cells = document.querySelectorAll('.cell');
        let currentPlayer = 'X';
        let board = Array(9).fill(null);
        let gameOver = false;

        // Winning combinations
        const winningCombinations = [
            [0, 1, 2],
            [3, 4, 5],
            [6, 7, 8],
            [0, 3, 6],
            [1, 4, 7],
            [2, 5, 8],
            [0, 4, 8],
            [2, 4, 6]
        ];

        // Handle cell click (Player's move)
        cells.forEach(cell => {
            cell.addEventListener('click', function() {
                if (!gameOver && !board[this.dataset.index] && currentPlayer === 'X') {
                    makeMove(this, 'X');
                    if (!gameOver) {
                        setTimeout(computerMove, 500); // Computer makes a move after player's turn
                    }
                }
            });
        });

        // Function to handle move making
        function makeMove(cell, player) {
            board[cell.dataset.index] = player;
            cell.innerText = player;

            if (checkWin(player)) {
                document.getElementById('message').innerText = `Player ${player} wins!`;
                gameOver = true;
                document.getElementById('restart').classList.remove('hidden');
            } else if (board.every(cell => cell !== null)) {
                document.getElementById('message').innerText = 'It\'s a draw!';
                document.getElementById('restart').classList.remove('hidden');
                gameOver = true;
            } else {
                currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
            }
        }

        // Computer's move
        function computerMove() {
            const availableCells = board.map((val, idx) => val === null ? idx : null).filter(val => val !== null);
            if (availableCells.length > 0) {
                const randomIndex = availableCells[Math.floor(Math.random() * availableCells.length)];
                const cell = document.querySelector(`.cell[data-index="${randomIndex}"]`);
                makeMove(cell, 'O');
            }
        }

        // Check for win
        function checkWin(player) {
            return winningCombinations.some(combination => {
                return combination.every(index => board[index] === player);
            });
        }

        // Restart the game
        document.getElementById('restart').addEventListener('click', function() {
            board = Array(9).fill(null);
            gameOver = false;
            currentPlayer = 'X';
            cells.forEach(cell => {
                cell.innerText = '';
            });
            document.getElementById('message').innerText = '';
            document.getElementById('restart').classList.add('hidden');
        });
    </script>
</body>
</html>
