<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("books");
include 'inc/functions.php';

$productName = $_GET["productName"];

$sql = "SELECT productName, price, productImage FROM om_product WHERE productName LIKE '%" . $productName . "%' ORDER BY productName ASC";

$np = array();
$np[":productName"] = $_GET["productName"];

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print_r($searchResults);
// foreach ($searchResults as $record){
echo json_encode($searchResults);
// }

?>