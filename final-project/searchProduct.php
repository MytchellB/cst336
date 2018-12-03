<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("ottermart");
include 'inc/functions.php';

$productName = $_GET["productName"];

$sql = "SELECT productName FROM om_product WHERE productName LIKE '%" . $productName . "%' ";

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