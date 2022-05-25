<?php

require('db_connection.php');

session_start();

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
    $sql = "SELECT * FROM $table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result;
}

function getImageId($filename) {
    global $conn;
    $sql = "SELECT id FROM images WHERE filename=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $filename);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['id']; 
}

function getTopicId($categoryName) {
    global $conn;
    $sql = "SELECT id FROM categories WHERE category_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $categoryName);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    return $result['id'];  
} 

function insertNewUser($username, $email, $password) {
    global $conn;
    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
}

function insertNewCategory($categoryName) {
    global $conn;
    $sql = "INSERT INTO categories (category_name, userId) VALUES (?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("si", $categoryName, $_SESSION['userId']);
    $stmt->execute(); 
}

function insertNewImage($fileName, $description) {
    global $conn;
    $sql = "INSERT INTO images (filename, description, userId) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ssi", $fileName, $description, $_SESSION['userId']);
    $stmt->execute(); 
}

function getUsersImages() {
    global $conn;
    $sql = "SELECT * FROM images WHERE userId=? ORDER BY created_at desc";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_SESSION["userId"]);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result; 
}

function getUsersPosts() {
    global $conn;
    $sql = "SELECT * FROM posts WHERE user_id=? ORDER BY created_at desc";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_SESSION["userId"]);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result; 
}


function getUsersBlog() {
    global $conn;
    $sql = "SELECT * FROM blogs WHERE user_id=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_SESSION["userId"]);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result; 
}

function getAllBlogs() {
    global $conn;
    $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function insertNewPost($title, $text, $topic, $image){
    global $conn;
    $imageId = getImageId($image);
    $topicId = getTopicId($topic);
    $userId = $_SESSION['userId'];
    $sql = "INSERT INTO posts (title, text, user_id, category_id, image_id) VALUES (?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ssiii", $title, $text, $userId, $topicId, $imageId);
    $stmt->execute(); 
} 

function insertNewBlog($title, $text, $image){
    global $conn;
    $imageId = getImageId($image);
    $userId = $_SESSION['userId'];
    $sql = "INSERT INTO blogs (title, description, user_id, image_id) VALUES (?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ssii", $title, $text, $userId, $imageId);
    $stmt->execute(); 
} 

function userCredentials($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $stmt->bind_param('s', $username);
        $stmt->execute();
        // Store the result so we can check if the account exists in the database.
        $stmt->store_result();
        $stmt->bind_result($userId, $pw);
      
        echo $stmt->num_rows;
        if ($stmt->num_rows == 1) { 
            $stmt->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($password, $pw)) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                // Store data in session variables
                $_SESSION["loggedIn"] = true;
                $_SESSION["userId"] = $userId;
                $_SESSION["username"] = $username;                            
                
                // Redirect user to welcome page
                header("location: index.php");
                exit();
            } else {
                $_SESSION['error-msg'] = "Invalid username or password.";
            }
        } else {
            $_SESSION['error-msg'] = "Invalid username or password.";
        }
        $stmt->close();
}
   
/*   function printQueryResult($result) {
     echo "<pre>",print_r($result, true),"</pre>";
     die();
}

 printQueryResult(getById($images, 22));  */