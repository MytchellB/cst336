<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("books");
include 'inc/functions.php';
validateSession();

$sql = "SELECT AVG(price) price FROM om_product;";
        
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$avgPrice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($avgPrice);

?>