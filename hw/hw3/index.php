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
                <form method="GET" id="form">
                    Text to Convert: <input type="text" name="myText"><br>
                    <input type="radio" name="pigLatin" value="pig latin" checked> Pig Latin<br>
                    <input type="submit" value="Submit">
                </form>
            </div>
        </main>
    </body>

</html>