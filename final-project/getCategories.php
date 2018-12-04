<?php
header('Access-Control-Allow-Origin: *');
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("books");
include 'inc/functions.php';

$sql = "SELECT catName, catId FROM bk_category WHERE 1";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($records);
?>