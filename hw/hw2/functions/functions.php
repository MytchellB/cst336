<?php
    $dice = array(); // 0 - 4 = player 1, 5 - 9 = player 2
    $numDice = 0; // Total number of dice on the table currently.
    $player1Dice = array(0,0,0,0,0,0); // This will keep track of # of each die face. 0 - 1's, 1 - 2's, 2 - 3's etc...
    $player1Points = 0;
    $playerPoints = array(0,0); // 0 = player 1's points, 1 = player 2's points.
    $whosPoints = 0; // Switch back and forth between calculating player 1's and 2's points.
    
    function rollDice(){ // rolls 5 dice and prints to screen
        for($i=0; $i<5; $i++){
            echo "<img src='img/".rand(1,6).".png'/>";
        }
    }
    
    function rollDiceArray(){ // Rolls 5 dice with an array and prints to screen.
        global $dice;
        global $numDice;
        for($i=0; $i<5; $i++){ // Plays 5 dice to the table.
            array_push($dice, rand(1,6));
            echo "<img src='img/".$dice[$numDice].".png'/>";
            $numDice++;
        }
    }
    
    function scoreDice(){
        global $dice;
        global $player1Dice;
        $player1Dice = array(0,0,0,0,0,0);
        global $player1Points;
        $player1Points = 0;
        $numPairs = 0;
        global $whosPoints;
        global $playerPoints;
        for($i=0; $i<5; $i++){ // Adds all dice to an array to easily check numbers of each dice face.
            switch($dice[$i]){
                case 1: $player1Dice[0]++; // One
                    break;
                case 2: $player1Dice[1]++; // Two
                    break;
                case 3: $player1Dice[2]++; // Three
                    break;
                case 4: $player1Dice[3]++; // Four
                    break;
                case 5: $player1Dice[4]++; // Five
                    break;
                case 6: $player1Dice[5]++; // Six
                    break;
            }
        }
        
        // $player1Dice = array(0,1,1,1,4,0); // This is to unit test the different die combos.
        
        if($player1Dice[0] == 1 && $player1Dice[1] == 1 && $player1Dice[2] == 1 && $player1Dice[3] == 1 && $player1Dice[4] == 1 && $player1Dice[5] == 1){ // If player got 1-2-3-4-5-6
            echo "FARKLE! 3000 points!" . "<br>";
            $player1Points += 3000;
        }
        
        for($i=0; $i < 6; $i++){ // Find pairs and add them to pair counter.
            if($i == 2){
                $numPairs++;
            }
        }
        if($numPairs == 3){ // If we found three pairs they win points.
            echo "Three Pairs! 1500 points!" . "<br>";
            $player1Points += 1500;
        }
        
        for($i=0; $i<6; $i++){ // Checks for triples and awards points.
            // echo $player1Dice[$i]; // Prints array, no longer needed.
            if($player1Dice[$i] >= 3){
                $player1Points += ($i + 1) * 100;
                $player1Dice[$i] -= 3;
            }
        }
        
        while($player1Dice[0] != 0){ // Adds 1's to player's points.
            $player1Points += 100;
            $player1Dice[0]--;
        }
        while($player1Dice[4] != 0){ // Adds 1's to player's points.
            $player1Points += 50;
            $player1Dice[4]--;
        }
        
        if($whosPoints == 0){
            $playerPoints[0] += $player1Points;
            echo "<br>" . "Player 1 points: " . $playerPoints[0] . "<br>";
            $whosPoints++;
        }
        else{
            $playerPoints[1] += $player1Points;
            echo "<br>" . "Player 2 points: " . $playerPoints[1] . "<br>";
            $whosPoints--;
        }
        
        for($i=0; $i<5; $i++){ // Removes the dice whose score was just calculated from the dice array.
            array_shift($dice);
        }
    }
    
    function whoWon(){ // Compares player's points and declares a winner.
        global $playerPoints;
        if($playerPoints[0] > $playerPoints[1]){
            echo "<br>" . "Player 1 WINS! with " . $playerPoints[0] . " points! <br>";
        }
        else if($playerPoints[0] == $playerPoints[1]){
            echo "<br>" . "It's a draw! with " . $playerPoints[0] . " points! <br>";
        }
        else{
            echo "<br>" . "Player 2 WINS! with " . $playerPoints[1] . " points! <br>";
        }
        
        echo "<br><br>";
        print_r(array_values($playerPoints)); // Print our values in array format.
    }
?>