<?php
session_start(); //Starts or resumes an existing session.
//session_destroy(); // clears all values in session.

if ( !isset($_SESSION["num_heads"]) ){
    $_SESSION["num_heads"] = 0;
    $_SESSION["num_tails"] = 0;
    $_SESSION["tossHistory"] = array();
}
    
if (rand(0,1) == 0){
    $_SESSION["num_tails"]++;
    $_SESSION["tossHistory"][] = "tails";
}
else {
    $_SESSION["num_heads"]++;
    $_SESSION["tossHistory"][] = "heads";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Coin Flipping </title>
    </head>
    <body>
        <h2> Heads: <?= $_SESSION["num_heads"] ?> </h2>
        <h2> Tails: <?= $_SESSION["num_tails"] ?> </h2>
        <h3> <?= print_r($_SESSION["tossHistory"]); ?> </h3>

    </body>
</html>