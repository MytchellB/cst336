<?php 
session_start();

include '../inc/dbConnection.php';
$dbConn = startConnection("books");
$namedParameters = array();

$username = $_POST['username'];
$password = sha1($_POST['password']);

// This does not prevent SQL Injection
// $sql = "SELECT * FROM om_admin
//         WHERE username = '$username'
//         AND password = '$password'";
        
// This DOES prevent against SQL injection
$sql = "SELECT * FROM om_admin
        WHERE username = :username
        AND password = :password";

$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;
        
$stmt = $dbConn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC); // We're expecting just one record.

print_r($record);

if (empty($record)) {
    echo "Incorrect username or password";
    echo "<br><a href='index.php'>Go back to User Search</a> <br>
    <a href='adminLogIn.php'>Admin Log In</a>";
}
else {
    $_SESSION['adminFullName'] = $record['firstName'] . " " . $record['lastName'];
    header('Location: admin.php'); // redirects to another program
}
?>