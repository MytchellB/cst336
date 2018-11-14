<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" /> 
        <title>Homework 4 - CST 336</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
        <?php
            include 'functions/functions.php';
        ?>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    
    <body>
        <main>
            <div>
                <header>Welcome to Word Converter!</header>
                <form method="GET" id="form">
                    Word to Convert: <input type="text" name="myText" id="myText" value='<?= $_GET['myText'] ?>' ><br>
                    <input type="radio" name="alter" class="alter" onclick="assignOption(this.value)" value="pig latin" <?= ($_GET['alter'] == 'pig latin')?" checked ":""?> > Pig Latin<br>
                    <input type="radio" name="alter" class="alter" onclick="assignOption(this.value)" value="reverse" <?= ($_GET['alter'] == 'reverse')?" checked ":""?> > Reverse<br>
                    <input type="radio" name="alter" class="alter" onclick="assignOption(this.value)" value="remove vowels" <?= ($_GET['alter'] == 'remove vowels')?" checked ":""?> > Remove Vowels<br>
                    <input type="checkbox" name="both" onclick="assignOption(this.value)" <?= ($_GET['both'] == 'on')?" checked ":""?> />Apply everything?<br>
                    <input type="submit" value="Submit" onclick="validateForm()">
                </form>
                <div id="output">
                    
                </div>
                <footer>
                    Takes in a user entered word, and converts it using whatever method the user selects.<br>
                    For educational purposes only - Mytchell Beaton
                </footer>
            </div>
        </main>
    </body>

</html>

<script>
    var word = $("#myText").val();
    $("#output").html(word);
    
    var option;

    function assignOption(option) {
        option = option;
        if(option == "pig latin"){
            word = convertToPigLatinJS(word);
            $("#output").html(word);
        }
        else if(option == "reverse"){
            word = reverseWordJS(word);
            $("#output").html(word);
        }
        else if(option == "remove vowels"){
            word = removeVowelsJS(word);
            $("#output").html(word);
        }
        else if(option == "on"){
            word = convertToPigLatinJS(word);
            word = reverseWordJS(word);
            word = removeVowelsJS(word);
            $("#output").html(word);
        }
    }
    
    if(word == ""){
        $("#output").html("Please enter your word, and hit submit.<br>Then click the buttons to apply changes to the word in real time.");
    }
    
    function validateForm(){

    }
    
    function convertToPigLatinJS(word){
        var first = word.substr(0, 1);
        var last = word.substr(1, word.length);
        return last + first + 'ay';
    }
    
    function reverseWordJS(word){
        var newWord = "";
        for(var i = (word.length - 1); i >= 0; i--){
            newWord += word[i];
        }
        return newWord;
    }
    
    function removeVowelsJS(word){
        var vowels = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];
        for(var i = 0; i < vowels.length; i++){
            word = word.replace(vowels[i], "");
        }
        return word;
    }

</script>