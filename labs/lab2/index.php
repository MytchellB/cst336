<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine - Mytchell Beaton </title>
    </head>
    <body>
        
        <?php
        
        function generateRandom($random_value) { // Generates a random number, and prints out the corresponding picture.
        
            // $random_value = rand(0,5);
            
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
            
            // Redundant variable $new
            $new = "<img src='img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' />";
            
            echo $new;
        
        }
        
        $counter = 0;
        $random_value = rand(0,5);
        $random_value2 = rand(0,5);
        $random_value3 = rand(0,5);
        
        // while ( $counter < 3){ // Generate 3 random numbers by calling function.
            generateRandom($random_value);
            generateRandom($random_value2);
            generateRandom($random_value3);
            // $counter += 1;
        // }
        
        
        echo "<br>Random Value: ", $random_value, "<br>";
        echo "Random Value: ", $random_value2, "<br>";
        echo "Random Value: ", $random_value3, "<br>";
        
        displayPoints($random_value, $random_value2, $random_value3);
        
        function displayPoints($random_value, $random_value2, $random_value3 ) {
            if ( $random_value3 == $random_value2 && $random_value2 == $random_value){
            echo "Winner!";
                switch ( $random_value ) {
                    case 0: echo "You won the Jackpot! 1000 points!";
                        break;
                    case 1: echo "You won with oranges! 50 points!";
                        break;
                    case 2: echo "You won with lemons! 250 points!";
                        break;
                    case 3: echo "You won with grapes! 55 points!";
                        break;
                    case 4: echo "You won with cherries! 750 points!";
                        break;
                    case 5: echo "You won with bars! 45 points!";
                        break;
                }
            }
            else{
                echo "Sorry, you lose!";
            }
        }
        
        ?>
        
        
        


    </body>
</html>