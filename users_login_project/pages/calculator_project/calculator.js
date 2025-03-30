let display = document.getElementById("display");
let currentOperation = "";

function appendNumber(number) {
    currentOperation += number;
    display.value = currentOperation;
}

function operate(operator) {
    currentOperation += operator;
    display.value = currentOperation;
}

function appendParenthesis(parenthesis) {
    currentOperation += parenthesis;
    display.value = currentOperation;
}

function calculate() {
    try {
        currentOperation = eval(currentOperation);
        display.value = currentOperation;
    } catch (e) {
        display.value = "Error";
        currentOperation = "";
    }
}

function clearDisplay() {
    currentOperation = "";
    display.value = "";
}
