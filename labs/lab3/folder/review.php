<?php
session_start();

$_SESSION["my_name"] = "Mytchell";
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Session Review </title>
        
        <?php
            
            
            
        ?>
    </head>
    <body>
        My name is <? = $_SESSION["my_name"] ?>

    </body>
</html>