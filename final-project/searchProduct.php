<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("books");
include 'inc/functions.php';

$productName = $_GET["productName"];
$priceFrom = $_GET["priceFrom"];
$priceTo = $_GET["priceTo"];

$sql = "SELECT productName, price, productImage FROM bk_product WHERE productName LIKE '%" . $productName . "%' AND price >= :priceFrom AND price <= :priceTo ORDER BY productName ASC";

$np = array();
// $np[":productName"] = $_GET["productName"];
$np[":priceFrom"] = $_GET["priceFrom"];
$np[":priceTo"] = $_GET["priceTo"];

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print_r($searchResults);
// foreach ($searchResults as $record){
echo json_encode($searchResults);
// }

?>