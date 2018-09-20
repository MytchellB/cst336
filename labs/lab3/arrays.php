<?php
    $symbols = array("seven", );
    array_push($symbols,"orange","grapes");
    // print_r($symbols);
    $symbols[] = "cherry";
    
    unset($symbols[2]);
    $symbols = array_values($symbols);
    
    
    // shuffle($symbols);
    // echo $symbols[rand(0,count($symbols) - 1)]; // Displays random item.
    
    $indices = array();
    
    $points = array("orange"=>250, "cherry"=>500, "seven"=>750);
    
    for ($i = 0; $i < 3; $i++){
        $symbol = $symbols[rand(0,count($symbols) - 1)];
        array_push($indices, $symbol);
        echo "<img src='../lab2/img/$symbol.png' alt='$symbol' title='".ucfirst($symbol)."' />"; // Displays random picture
    }
    if ($indices[0] == $indices[1] && $indices[1] == $indices[2]){
        echo "You win ", $points[$indices[0]], " points, Congratulations!";
    }
    
    
    function printArray(){
        global $symbols;
        for($i = 0; $i < count($symbols); $i++){
            echo $symbols[$i] . ", ";
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3 - Arrays </title>
    </head>
    <body>
        <?php 
            // printArray();
        ?>
    </body>
</html>