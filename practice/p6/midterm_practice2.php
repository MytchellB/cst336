<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("midterm_practice");

function executeSQL() { 
    global $dbConn;
    
    $sql = "SELECT town_name, population FROM `mp_town` WHERE population > 50000 AND population < 80000"; // SQL statement 1
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($records);
    echo "<br>";
    
    $sql = "SELECT town_name, population FROM `mp_town` ORDER BY population DESC"; // SQL statement 2
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($records);
    echo "<br>";
    
    $sql = "SELECT town_name, population FROM `mp_town` ORDER BY population ASC LIMIT 3"; // SQL statement 3
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($records);
    echo "<br>";
    
    $sql = "SELECT county_name FROM `mp_county` where county_name LIKE 'S%'"; // SQL statement 4
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    print_r($records);
    
    // foreach ($records as $record) {
    //     echo "<option value='".$record['catId']."'>" . $record['catName'] . "</option>";
    // }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
            
        </style>
        
    </head>
    <body>
        <main>
            <header> Winter Vacation Planner! </header>
            <?= executeSQL(); ?>
        </main>
        
    </body>
</html>