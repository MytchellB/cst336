<?php

    function getLuckyNumber(){
        $randValue = rand(1,10);
        while ($randValue == 4){
            $randValue = rand(1,10);
        }
        echo $randValue;
    }
    
    function getRandomColor(){
        echo"rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Number and BG </title>
        <style>
            body { 
                background-color: <?php getRandomColor() ?>;
            }
            h1 { 
                background-color: <?php getRandomColor() ?>;
                color: <?php getRandomColor() ?>;
            }
        </style>
    </head>
    <body>
        <h1>
        My Lucky Number is:
        <?php
        getLuckyNumber();
        ?>
        </h1>
        

    </body>
</html>