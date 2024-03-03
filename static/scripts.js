const radioButtons = document.querySelectorAll('.options input[type="radio"]');
const form = document.getElementById('question_form');
const errorMsg = document.getElementById('error');
const quitBtn = document.getElementById('quit');


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

form.addEventListener('submit', function (e){
    e.preventDefault();
    if (!checkIfSelected()) { // Negate the condition
        errorMsg.innerHTML = 'Select an option <br>';
        errorMsg.style.display = 'block';
    } else {
        form.submit();
    }
})

quitBtn.addEventListener('click', function (){
    window.location.href = 'index.php';
});