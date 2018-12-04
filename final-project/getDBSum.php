<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("books");
include 'inc/functions.php';
validateSession();

$sql = "SELECT SUM(price) as sum from bk_product";
        
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$sum = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($sum);
?>