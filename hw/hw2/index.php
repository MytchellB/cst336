<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" /> 
        <title>Homework 2 - CST 336</title>
        
        <link href="css/styles.css" rel="stylesheet" />
        
        <?php
            include 'functions/functions.php';
            
            
        ?>
    </head>
    
    <body>
        <main>
            <div id="main">
                <header>
                    <div id="header">
                        Welcome to 10,000!
                    </div>
                </header>
                <?php
                    rollDice();
                    echo "<br><br>";
                    rollDice();
                    echo "<br><br>";
                    rollDiceArray();
                    echo "<br><br>";
                    rollDiceArray();
                    echo "<br><br>";
                    scoreDice();
                ?>
                
                <footer>
                    <div id="footer">
                        Educational purposes only - Mytchell Beaton  <br>
                        Rules of 10k: <br>
                        1's = 100 <br>
                        5's = 50 <br>
                        Three 1's = 100<br>
                        Three 2's = 200<br>
                        Three 3's = 200<br>
                        etc... <br>
                        1-2-3-4-5-6 = 3000 <br>
                        Three Pairs = 1500
                    </div>
                </footer>
            </div>
        </main>
    </body>

</html>