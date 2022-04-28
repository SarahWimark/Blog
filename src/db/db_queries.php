<?php

require('db_connection.php');

function getAll($table) {
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

function executeQuery($sql, $data) {
    //...
}
   
function printQueryResult($result) {
    echo "<pre>",print_r($result, true),"</pre>";
    die();
}


printQueryResult(getById('users', 1));
//printQueryResult(getAll('users'));