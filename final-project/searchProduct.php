<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("books");
include 'inc/functions.php';

$productName = $_GET["productName"];
$priceFrom = $_GET["priceFrom"];
$priceTo = $_GET["priceTo"];
$category = $_GET["category"];

$sql = "SELECT productName, price, productImage, catID FROM bk_product WHERE productName LIKE '%" . $productName . "%' AND price >= :priceFrom AND price <= :priceTo";

$np = array();
// $np[":productName"] = $_GET["productName"];
$np[":priceFrom"] = $_GET["priceFrom"];
$np[":priceTo"] = $_GET["priceTo"];

// Check to see which category has been selected to display.
if($category != 0){ // Checks if category has been set
    $sql .= " AND catID = :catID";  
    $np[":catID"] = $_GET["category"];
}

$sql .= " ORDER BY productName ASC";

$stmt = $dbConn->prepare($sql);
$stmt->execute($np);
$searchResults = $stmt->fetchAll(PDO::FETCH_ASSOC);

// print_r($searchResults);
// foreach ($searchResults as $record){
echo json_encode($searchResults);
// }

?>