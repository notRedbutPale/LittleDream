<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock, Paper, Scissors</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        h1 {
            font-size: 3em;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2em;
        }

        .choices-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .choice {
            margin: 0 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .choice img {
            width: 100px;
            height: 100px;
        }

        .choice:hover {
            transform: scale(1.1);
        }

        #result {
            font-size: 1.5em;
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border: 2px solid #333;
            display: inline-block;
        }

        .winner {
            color: green;
        }

        .loser {
            color: red;
        }

        .tie {
            color: orange;
        }
    </style>
</head>
<body>


    <h1>Rock, Paper, Scissors</h1>

    <p>Choose your move:</p>

    <div class="choices-container">
        <div class="choice" data-choice="rock">
            <img src="https://img.icons8.com/ios/100/000000/rock.png" alt="Rock">
        </div>
        <div class="choice" data-choice="paper">
            <img src="https://img.icons8.com/ios/100/000000/toilet-paper.png" alt="Paper">
        </div>
        <div class="choice" data-choice="scissors">
            <img src="https://img.icons8.com/ios/100/000000/scissors.png" alt="Scissors">
        </div>
    </div>

    <p id="result"></p>

    <script>
        const choices = document.querySelectorAll('.choice');
        const result = document.getElementById('result');

        const gameChoices = ['rock', 'paper', 'scissors'];

        choices.forEach(button => {
            button.addEventListener('click', () => {
                const userChoice = button.getAttribute('data-choice');
                const computerChoice = gameChoices[Math.floor(Math.random() * 3)];

                let winner = '';
                let resultClass = '';

                if (userChoice === computerChoice) {
                    winner = 'It\'s a tie!';
                    resultClass = 'tie';
                } else if (
                    (userChoice === 'rock' && computerChoice === 'scissors') ||
                    (userChoice === 'paper' && computerChoice === 'rock') ||
                    (userChoice === 'scissors' && computerChoice === 'paper')
                ) {
                    winner = 'You win!';
                    resultClass = 'winner';
                } else {
                    winner = 'Computer wins!';
                    resultClass = 'loser';
                }

                result.innerHTML = `You chose <strong>${userChoice}</strong>, computer chose <strong>${computerChoice}</strong>. <span class="${resultClass}">${winner}</span>`;
            });
        });
    </script>
</body>
</html>
