<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" /> 
        <title>Final Project - CST 336</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link href="styles/styles.css" rel="stylesheet" />
        <?php
            include 'inc/functions.php';
        ?>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="jsFunctions.js"></script>
    </head>
    
    <body>
        <main>
            <div>
                <header>User Search!</header>
                <a href="adminLogIn.php">Admin Log In</a>
                <?php 
                    searchProduct('lenovo');
                ?>
                
                <br><br><hr>
                <footer>
                    For educational purposes only - Mytchell Beaton
                </footer>
            </div>
        </main>
    </body>

</html>