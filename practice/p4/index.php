<!DOCTYPE html>
<html>
    <head>
        <title> Aces vs Kings </title>
        <style type="text/css">
            body{
                text-align:center;
                font-size:24px;
            }
            form{
                font-size:24px;
            }
            select{
               font-size:24px;
            }
            input{
                font-size:24px;
            }
            footer{
                font-size:18px;
            }
        </style>
    </head>
    <body>
       <H1> Aces Vs. Kings </H1>
       <div id="game">
           <div id="table">
               <table align="center">
                   <?php
                        include 'functions/functions.php';
                        drawCards($_POST['rows'], $_POST['columns'], $_POST['omitSuit']);
                    ?>
                </table>
           </div>
           <br>
       
            <form method="POST">
                Number of Rows: 
                <input type="text" name="rows" value="5">
                <br><br>
                Number of Columns:
                <input type="text" name="columns" value="5">
                <br><br>
                Suit to Omit: 
                <select name="omitSuit">
                    <option value="1">Hearts</option>
                    <option value="2">Clubs</option>
                    <option value="3">Diamonds</option>
                    <option value="4">Spades</option>
                </select>
                <input type="submit">
            </form>
            
            <footer>
                <br><hr>
                Mytchell Beaton 2018
            </footer>
        </div>
       
    </body>
</html>