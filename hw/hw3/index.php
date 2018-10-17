<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" /> 
        <title>Homework 3 - CST 336</title>
        <link href="css/styles.css" rel="stylesheet" />
        <?php
            include 'functions/functions.php';
        ?>
    </head>
    
    <body>
        <main>
            <div>
                <header>Welcome to Word Converter!</header>
                <form method="GET" id="form">
                    Word to Convert: <input type="text" name="myText" value='<?= $_GET['myText'] ?>' ><br>
                    <input type="radio" name="alter" value="pig latin" <?= ($_GET['alter'] == 'pig latin')?" checked ":""?> > Pig Latin<br>
                    <input type="radio" name="alter" value="reverse" <?= ($_GET['alter'] == 'reverse')?" checked ":""?> > Reverse<br>
                    <input type="radio" name="alter" value="remove vowels" <?= ($_GET['alter'] == 'remove vowels')?" checked ":""?> Remove Vowels<br>
                    <input type="checkbox" name="both" <?= ($_GET['both'] == 'on')?" checked ":""?> />Apply everything?<br>
                    <input type="submit" value="Submit">
                </form>
                <div id="output">
                    <?php
                        
                        if( empty($_GET['myText']) || ( !isset($_GET['both']) && !isset($_GET['alter'])) ){
                            echo "You need to enter text and select an option, try harder.";
                        }
                        else if( $_GET['both'] == 'on'){
                            $newWord = convertToPigLatin($_GET['myText']);
                            echo "Pig Latinized: ".$newWord." <br>";
                            $newWord = ucwords(strtolower(reverseWord($newWord)));
                            echo "Reversed: ".$newWord." <br>";
                            echo "Word has been converted to pig latin, reversed, and had it's vowels removed:<br>";
                            echo ucwords(strtolower(removeVowels($newWord)));
                        }
                        else if ($_GET['alter'] == 'pig latin'){
                            echo "Word has been converted to pig latin:<br>";
                            echo convertToPigLatin($_GET['myText']);
                        }
                        else if ($_GET['alter'] == 'reverse'){
                            echo "Word has been reversed:<br>";
                            echo ucwords(reverseWord($_GET['myText']));
                        }
                        else if ($_GET['alter'] == 'remove vowels'){
                            echo ">Word has had vowels removed:<br>";
                            echo ucwords(removeVowels($_GET['myText']));
                        }
                    ?>
                </div>
                <footer>
                    Takes in a user entered word, and converts it using whatever method the user selects.<br>
                    For educational purposes only - Mytchell Beaton
                </footer>
            </div>
        </main>
    </body>

</html>