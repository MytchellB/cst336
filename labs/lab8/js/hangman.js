// Variables
var selectedWord = "";
var selectedHint = "";
var board = [];
var remainGuesses = 6;
var words = [{ word: "snake", hint: "It's a reptile" },
             { word: "monkey", hint: "It's a mammal" },
             { word: "beetle", hint: "It's an insect" }];

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
    createLetters();
}

function initBoard() {
    for (var letter in selectedWord) {
        board.push("_");
    }
}

function pickWord() {
    var randomInt = Math.floor(Math.random() * words.length);
    selectedWord = words[randomInt].word.toUpperCase();
    selectedHint = words[randomInt].hint;
}

function updateBoard() {
    $("#word").empty();
    
    for (var i=0; i < board.length; i++) {
        $("#word").append(board[i] + " ");
    }
    
    $("#word").append("<br />");
    $("#hint").append("<button class='btn btn-success' id='hints'>Display Hint</button>")
    $("#word").append("<span class='hint' >Hint: " + selectedHint + "</span");
}

function createLetters() {
    for (var letter of alphabet) {
        $("#letters").append("<button class='letter btn btn-success' id='" + letter + "'>" + letter + "</button>");
    }
}

// Checks to see if the selected letter exists in the selectedWord
function checkLetter(letter) {
    var positions = new Array();
    
    // Put all the positions the lettter exists in an array
    for (var i = 0; i < selectedWord.length; i++) {
        if (letter == selectedWord[i]){
            positions.push(i);
        }
    }
    
    if (positions.length > 0) {
        updateWord(positions, letter);
        
        if (!board.includes('_')) {
	        endGame(true);
        }
    }
    else {
        remainGuesses -= 1;
        updateMan();
    }
    
    if (remainGuesses <= 0) {
        endGame(false);
    }
}

// Update the current word then calls for a board update
function updateWord(positions, letter) {
    for (var pos of positions) {
        board[pos] = letter;
    }
    
    updateBoard();
}

// Calculates and updates the image for our stick man
function updateMan() {
    $("#hangImg").attr("src", "img/stick_" + (6 - remainGuesses) + ".png");
}

function endGame(win) {
    $("#letters").hide();
    
    if(win) {
        $('#won').show();
    }
    else {
        $('#lost').show();
    }
}

function disableButton(btn) {
    btn.prop("disabled", true);
    btn.attr("class", "btn btn-danger");
}

function displayHint() {
    $('.hint').style.display = 'visible';
    remainGuesses -= 1;
    $('#hints').style.display = 'none';
}


// Handlers
$(".letter").click(function(){
    console.log($(this).attr("id"));
    checkLetter($(this).attr("id"));
});

$(".replayBtn").on("click", function() {
    location.reload();
});

$(".letter").click(function() {
    checkLetter($(this).attr("id"));
    disableButton($(this));
})

$("#hints").click(function() {
    displayHint();
})