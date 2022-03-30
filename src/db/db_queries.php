<?php

require('connection.php');

function getAllUsers($table) {
    global $conn;
    $sql = "SELECT * FROM $table";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function printQueryResult($result) {
    echo "<pre>",print_r($result),"</pre>";
}

printQueryResult(getAllUSers('users'));