<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("books");
include 'inc/functions.php';
validateSession();

$sql = "SELECT price, productName FROM bk_product WHERE 1 ORDER BY price DESC LIMIT 1";
        
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$highestPrice = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($highestPrice);
?>