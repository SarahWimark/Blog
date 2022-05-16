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

function userCredentials($username, $password) {
    global $conn;
    if ($stmt = $conn->prepare('SELECT id, password FROM users WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $username);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($userId, $pw);
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($password, $pw)) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
               return true;
            } else {
               return false;
            }
        } else {
            return false;
        }
    
       // $stmt->close();
    }
   
    return false;
}
   
// function printQueryResult($result) {
//     echo "<pre>",print_r($result, true),"</pre>";
//     die();
// }

// printQueryResult(getById('users', 1));