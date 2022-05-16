<?php

require('db_connection.php');

function getAllFromTable($table) {
    global $conn;
    $sql = "SELECT * FROM $table";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function getById($table, $id) {
    global $conn;
    $sql = "SELECT * FROM $table WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result;
}

function insertNewUser($username, $email, $password) {
    global $conn;
    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
}
   
// function printQueryResult($result) {
//     echo "<pre>",print_r($result, true),"</pre>";
//     die();
// }

// printQueryResult(getById('users', 1));