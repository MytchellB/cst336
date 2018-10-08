<?php
    //Creating database connection
    $host = "localhost";
    $dbname = "ottermart";
    $username = "root";
    $password = "";
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "SELECT * FROM om_category";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $records = $stmt -> fetch(); // Creates array of values.
    print_r($records);
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
    </head>
    <body>
        <main>
      	
        </main>
         <br/><br/>
    </body>
    
</html>