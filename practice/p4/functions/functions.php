<?php
    $suits = array(clubs, diamonds, hearts, spades);
    function drawCards($numRows, $numColumns, $suitToOmit){
        global $suits;
        $currentSuit;
        $currentCard;
        for($i=0; $i < $numRows; $i++){
            $currentSuit = $suits[rand(0,2)];
            echo "<tr>";
            for($u=0; $u < $numColumns; $u++){
                $currentCard = rand(0,12) + 1;
                echo "<th>", $i;
                
                echo "</th>";
            }
            
            echo "</th>";
        }
    }
?>