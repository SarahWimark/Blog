<?php include("db_config.php");

$conn = new mysqli($host, $user, $password, $db_name);

if($conn->connect_error) {
    die("Database connection failed. " . $conn->connect_error);
} 