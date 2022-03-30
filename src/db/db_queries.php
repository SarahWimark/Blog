<?php

require('connection.php');

function getAllUsers($table) {
    global $conn;
    $sql = "SELECT * FROM $table";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function getUserById($table, $id) {
    global $conn;
    $sql = "SELECT * FROM $table WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result;
}

function executeQuery($sql, $data) {
    
}
   
function printQueryResult($result) {
    echo "<pre>",print_r($result, true),"</pre>";
    die();
}

// printQueryResult(getAllUSers('users'));
printQueryResult(getUserById('users', 1));