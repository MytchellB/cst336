<?php
    $dice = array(); // 0 - 3 = player 1, 4 - 7 = player 2
    
    function rollDice(){ // rolls 5 dice and prints to screen
        for($i=0; $i<5; $i++){
            echo "<img src='img/".rand(1,6).".png'/>";
        }
    }
    
    function rollDiceArray(){
        global $dice;
        for($i=0; $i<5; $i++){
            array_push($dice, rand(1,6));
            echo "<img src='img/".$dice[$i].".png'/>";
        }
    }
    
    function scoreDice(){
        global $dice;
        
    }

?>