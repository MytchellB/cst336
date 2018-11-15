// Variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainGuesses = 6;
var words = ["snake", "monkey", "beetle"];

// Creating an array of variable letters
var alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 
                'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 
                'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            
// Listeners
window.onload = startGame();

// Functions
function startGame() {
    pickWord();
    initBoard();
    updateBoard();
}

function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt];
}

function updateBoard() {
    for (var letter of board) {
        document.getElementById("word").innerHTML += letter + " ";
    }
}

function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button class='letter' id='" + letter + "'>" + letter + "</button>");
    }
}

// Checks to see if the selected letter exists in the selectedWord
function checkLetter(letter) {
    var positions = new Array();
    
    // Put all the positions the lettter exists in an array
    for (var i = 0; i < selectedWord.length; i++) {
        console.log(selectedWord);
        if (letter == selectedWord[i]){
            positions.push(i);
        }
    }
}

$(".letter").click(function(){
    console.log($(this).attr("id"));
});

