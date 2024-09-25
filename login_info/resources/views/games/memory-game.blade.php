<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memory Game</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(4, 100px);
            gap: 10px;
            justify-content: center;
            margin-top: 50px;
        }
        .card {
            width: 100px;
            height: 100px;
            background-color: lightgray;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            cursor: pointer;
            user-select: none;
        }
        .card.matched {
            background-color: lightgreen;
        }
    </style>
</head>
<body>


    <h1 style="text-align: center;">Memory Game</h1>

    <div class="grid" id="grid">
        <!-- 8 pairs of cards, shuffled -->
    </div>

    <script>
        const cardValues = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        let grid = document.getElementById('grid');
        let cards = [];
        let flippedCards = [];
        let matchedPairs = 0;

        // Double the cards array and shuffle it
        cards = [...cardValues, ...cardValues].sort(() => Math.random() - 0.5);

        // Create card elements
        cards.forEach((value, index) => {
            const card = document.createElement('div');
            card.classList.add('card');
            card.dataset.value = value;
            card.dataset.index = index;
            grid.appendChild(card);

            // Add click event
            card.addEventListener('click', function() {
                // Prevent clicking more than two cards or clicking the same card twice
                if (flippedCards.length < 2 && !this.classList.contains('flipped') && !this.classList.contains('matched')) {
                    this.innerText = this.dataset.value;
                    this.classList.add('flipped');
                    flippedCards.push(this);

                    if (flippedCards.length === 2) {
                        setTimeout(checkMatch, 1000);
                    }
                }
            });
        });

        // Check if two flipped cards match
        function checkMatch() {
            if (flippedCards[0].dataset.value === flippedCards[1].dataset.value) {
                // Match found
                flippedCards.forEach(card => {
                    card.classList.add('matched');
                    card.classList.remove('flipped');
                });
                matchedPairs++;
                if (matchedPairs === cardValues.length) {
                    setTimeout(() => {
                        alert('You win! All pairs matched.');
                    }, 500);
                }
            } else {
                // No match, flip cards back
                flippedCards.forEach(card => {
                    card.innerText = '';
                    card.classList.remove('flipped');
                });
            }
            flippedCards = [];
        }
    </script>
</body>
</html>
