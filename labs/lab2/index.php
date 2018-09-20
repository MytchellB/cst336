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
        
        <br><br><br><hr width="50%">
        <footer>
            This website is intended for educational purposes only.<br>
            - Mytchell Beaton<br>
            <img src="img/buddy_verified.png" alt="buddy verified sticker" title="buddy verified"/>
        </footer>
        
    </body>
</html>