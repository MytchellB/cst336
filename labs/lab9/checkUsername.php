<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$sql = "SELECT * FROM om_admin WHERE username = ". $_GET['username'];

?>