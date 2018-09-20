<?php
        $reelCounter = 1; // Counts the reel number we are currently on, to be used for the reel id div.
        $results; // Store the results as a global var so we can access them whenever we need.
        
        function generateRandom($random_value) { // Generates a random number, and prints out the corresponding picture.
            global $reelCounter;
            switch ( $random_value ) {
                case 0: $symbol = "seven";
                    break;
                case 1: $symbol = "orange";
                    break;
                case 2: $symbol = "lemon";
                    break;
                case 3: $symbol = "grapes";
                    break;
                case 4: $symbol = "cherry";
                    break;
                case 5: $symbol = "bar";
                    break;
            }
            echo "<img id='reel$reelCounter' src='img/$symbol.png' alt='$symbol'  width='70px' title='".ucfirst($symbol)."' />"; // Print image of symbol to screen. Width 70px is necessary.
            $reelCounter++; // Go to the next reel.
        }
        
        function displayPoints($random_value, $random_value2, $random_value3 ) { // Compares the results and awards points.
            global $results;
            if ( $random_value3 == $random_value2 && $random_value2 == $random_value){
                switch ( $random_value ) {
                    case 0: $results = "You won the Jackpot! 1000 points!";
                        break;
                    case 1: $results = "You won with oranges! 500 points!";
                        break;
                    case 2: $results = "You won with lemons! 250 points!";
                        break;
                    case 3: $results = "You won with grapes! 900 points!";
                        break;
                    case 4: $results = "You won with cherries! 750 points!";
                        break;
                    case 5: $results = "You won with bars! 50 points!";
                        break;
                }
            }
            else{
                $results = "Sorry, you lose! Try Again!";
            }
        }
        
        function printResults(){ // Prints the results from displayPoints, used to pinpoint the results into a specific output div.
            global $results;
            echo $results;
        }
        
        function play(){ // Plays the slot machine game.
            global $random_value, $random_value2, $random_value3;
            $random_value = rand(0,5);
            $random_value2 = rand(0,5);
            $random_value3 = rand(0,5);
            generateRandom($random_value); // Generate random prints the pictures to the machine.
            generateRandom($random_value2);
            generateRandom($random_value3);
            displayPoints($random_value, $random_value2, $random_value3); // Display points decides if you won, and stores the results in a global string, to be announced in the printResults function.
        }
?>