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

$(".letter").click(function(){
    console.log($(this).attr("id"));
});