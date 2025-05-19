<?php
session_start();
$host = 'localhost';
$db = 'smk';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal</title>
    <link rel="stylesheet" href="style.css"></link>
</head>
<body>
    
</body>
</html>