<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$value = $_GET['option'];

   global $dbConn;
    $sql = "UPDATE `poll` SET `count`= count + 1 ";


if($value == "yes"){
    $sql .= "WHERE ansId = 1";
}
if($value == "may"){
    $sql .= "WHERE ansId = 3";
}
if($value == "no"){
    $sql .= "WHERE ansId = 2";
}

$stmt = $dbConn->prepare($sql);
    $stmt->execute();
    
    display();
    function display(){
     global $dbConn;
    $sql = "SELECT * FROM `poll` WHERE 1";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($records as $record) {
        echo  $record['count'] . "<br>";
    }
}

?>