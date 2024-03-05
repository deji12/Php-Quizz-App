const radioButtons = document.querySelectorAll('.options input[type="radio"]');
const form = document.getElementById('question_form');
const errorMsg = document.getElementById('error');
const quitBtn = document.getElementById('quit');
const formSubmitBtn = document.getElementById('quiz-submit-btn');


// Function to check if any radio button is selected
function checkIfSelected() {
    let selected = false;
    Array.from(radioButtons).forEach(button => {
        if (button.checked) {
            selected = true;
        }
    });
    return selected;
}

formSubmitBtn.addEventListener('click', function (e){
    e.preventDefault();
    if (confirm("You are about to submit quiz\nOnce submit, you will be graded immediately") == true) {
        form.submit();
    }
})

quitBtn.addEventListener('click', function (){
    window.location.href = 'index.php';
});