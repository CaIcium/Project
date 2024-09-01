$(document).ready(function() {
    const $textElement = $('#text');
    const $inputElement = $('#input');
    const $headerElement = $('#goodluck');
    const $timeElement = $('#time');
    const $correctElement = $('#correct');
    const $incorrectElement = $('#incorrect');
    const $accElement = $('#acc');
    const $wpnElement = $('#wpn');
    const $squareElement = $('#square');
    const $correctInput = $('#correctInput');
    const $incorrectInput = $('#incorrectInput');
    const $accInput = $('#accInput');
    const $wpnInput = $('#wpnInput');
    let isGameStarted = true;
    let correctLetters = 0;
    let incorrectLetters = 0;
    function formatText(text) {
        return text.split('').map(() => '<span class="char"></span>').join('');
    }

    function updateText() {
        $headerElement.text('Powodzenia!');
        const userInput = $inputElement.val();
        const $chars = $textElement.find('.char');

        if (isGameStarted) {
            isGameStarted = false;
            startTimer(initialTime);
        }

        correctLetters = 0;
        incorrectLetters = 0;

        $chars.each(function(index) {
            if (index < userInput.length) {
                if (userInput[index] === targetText[index]) {
                    $(this).text(targetText[index]).css('color', 'green');
                    correctLetters++;
                } else {
                    $(this).text(targetText[index]).css('color', 'red');
                    incorrectLetters++;
                }
            } else {
                $(this).text(targetText[index]);
                if ($(this).css('color') === 'rgb(255, 0, 0)') {
                    incorrectLetters--;
                } else {
                    correctLetters--;
                }
                $(this).css('color', '');
            }
        });

        if (userInput.length >= targetText.length) {
            endGame($timeElement.text());
        }
    }

    function endGame(countdown) {
        incorrectLetters--;
        correctLetters++;
        let acc = parseFloat((correctLetters / (correctLetters + incorrectLetters) * 100).toFixed(2));
        let wpn = parseFloat(((correctLetters + incorrectLetters) / (5 * ((initialTime - countdown) / 60))).toFixed(2));
        $correctElement.text(correctLetters);
        $incorrectElement.text(incorrectLetters);
        $accElement.text(acc + "%");
        $wpnElement.text(wpn);
        $squareElement.css('top', '15%');

        $correctInput.val(correctLetters);
        $incorrectInput.val(incorrectLetters);
        $accInput.val(acc + "%");
        $wpnInput.val(wpn);
    }

    async function startTimer(duration) {
        let countdown = duration;
        while (countdown >= 0) {
            $timeElement.text(countdown);
            await new Promise(resolve => setTimeout(resolve, 1000));
            countdown--;
        }
        endGame(countdown);
    }

    $inputElement.on('input', updateText);
    function startGame() {
        $textElement.html(formatText(targetText));
        $inputElement.val('');
        $inputElement.focus();
    }

    startGame();
});
