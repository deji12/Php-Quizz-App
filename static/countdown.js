const startBtn = document.getElementById('start');
const brief = document.getElementById('brief');
const quizContainer = document.getElementById('quiz-container');

function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (timer <= 20) {
            display.style.fontWeight = 'bold';
            display.style.color = 'firebrick';
        }

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

startBtn.addEventListener('click', function (){
    brief.style.display = 'none';
    quizContainer.style.display = 'flex';

    display = document.querySelector('#time');
    startTimer(quizDuration, display);
});