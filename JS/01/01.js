//User picks a number from 1 to 10, if it matches, then it is true, if not, then it is false
let userNumber = window.prompt("Pick a number from 1 to 10");
let randomNumber = Math.ceil(Math.random) * 10;

while (userNumber != randomNumber) {
    userNumber = window.prompt("Wrong number, try again");
}
document.write("Congratulations! You picked the right number: " + randomNumber);