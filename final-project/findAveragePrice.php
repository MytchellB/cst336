<?php
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';
validateSession();

if (isset($_GET['find Average Price'])) { 

    $sql = "SELECT AVG(price) price FROM om_product;";
        
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $avgPrice = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $avgPrice;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Find Average Price of All Items </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="styles/styles.css" type="text/css" />
        
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
            $("document").ready(function() {
                $("#displayAvgPrice").html(<?php echo $avgPrice ?>);
                
            }); // document ready
            
            
        </script>
    </head>
    <body>
        
        <h1> Finding Average Price of All Items </h1>
        
        <div id="displayAvgPrice">
            

        </div>
        <form>
        <input type="submit" name="find Average Price" value="Find Average Price">
        </form><br>

        <a href='admin.php'>Admin Page</a>
    </body>
</html>