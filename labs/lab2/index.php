<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine - Mytchell Beaton </title>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
        <div id="main">
            <?php
                include 'inc/functions.php';
                echo play();
            ?>
            <div id='output'>
                <h3> 
                    <?php 
                        echo printResults(); 
                    ?> 
                </h3>
            </div>
            
            <form>
                <input type="submit" value="Spin!"/>
            </form>
        </div>
        
    </body>
</html>