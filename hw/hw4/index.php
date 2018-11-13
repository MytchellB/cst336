<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" /> 
        <title>Homework 3 - CST 336</title>
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
        $("#output").html(option);
    }
    
    // if ( word == ""){
    //     $("#output").html("Please enter a word");
    // }
    // else{
    //     $("#output").html(word);
    // }
    
    // var word = document.getElementById("form").elements[0].value;
    // $("#output").html(word);
    
    // for(var i = 1; i < 4; i++) {
    //     if(document.getElementById("form").elements[i].checked() == "true") {
    //         $("#output").html(document.getElementById("form").elements[i].value);
    //     }
    // }
    
    function validateForm(){
        // var x = document.getElementById("form").elements[0].value;
        // $("#output").html(x);
    }

</script>