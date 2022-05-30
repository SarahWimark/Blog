<?php

require('db_connection.php');

session_start();

function getAllFromTable($table) {
    global $conn;
    $sql = "SELECT * FROM $table";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

function getById($table, $id) {
    global $conn;
    $sql = "SELECT * FROM $table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;
}

function delete($table, $id) {
    global $conn;
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    return $result;
}

function getImageId($filename) {
    global $conn;
    $sql = "SELECT id FROM images WHERE filename=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $filename);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result['id']; 
}

function getTopicId($categoryName) {
    global $conn;
    $sql = "SELECT id FROM categories WHERE category_name=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $categoryName);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result['id'];  
} 

function insertNewUser($username, $email, $password) {
    global $conn;
    $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $stmt->close();
}

function checkUserExists($username) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;  
}

function checkEmailExists($email) {
    global $conn;
    $sql = "SELECT users (username, email, password) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);
    $stmt->execute();
    $stmt->close();
}

function insertNewImage($fileName, $description) {
    global $conn;
    $sql = "INSERT INTO images (filename, description, user_id) VALUES (?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ssi", $fileName, $description, $_SESSION['userId']);
    $stmt->execute(); 
    $stmt->close();
}

function updateImage($id, $description) {
    global $conn;
    $sql = "UPDATE images SET description=? WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("si", $description, $id);
    $stmt->execute(); 
    $stmt->close();
}

function getUsersImages() {
    global $conn;
    $sql = "SELECT * FROM images WHERE user_id=? ORDER BY created_at desc";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_SESSION["userId"]);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result; 
}

function getUsersPosts($id) {
    global $conn;
    $sql = "SELECT * FROM posts WHERE user_id=? ORDER BY created_at desc";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result; 
} 


function getUsersBlog($id) {
    global $conn;
    $sql = "SELECT * FROM blogs WHERE user_id=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result; 
}

function getAllBlogs() {
    global $conn;
    $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}
function getBlogsFromSearchterm() {
    global $conn;
    $sql = "SELECT * FROM blogs WHERE title like 'My Fitnessblog'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

function getAllPosts() {
    global $conn;
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
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
    $stmt->close();
}  

function updatePost($title, $text, $id) {
    global $conn;
    $sql = "UPDATE posts SET title=?, text=? WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ssi", $title, $text, $id);
    $stmt->execute(); 
    $stmt->close();
}

function insertNewBlog($title, $text, $image){
    global $conn;
    $imageId = getImageId($image);
    $userId = $_SESSION['userId'];
    $sql = "INSERT INTO blogs (title, description, user_id, image_id) VALUES (?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ssii", $title, $text, $userId, $imageId);
    $stmt->execute(); 
    $stmt->close();
} 

function updateBlog($title, $description, $imageId, $id) {
    global $conn;
    $sql = "UPDATE blogs SET title=?, description=?, image_id=? WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ssii", $title, $description, $imageId, $id);
    $stmt->execute(); 
    $stmt->close();
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
                header("location: login.php");
                exit();
            }
        } else {
            $_SESSION['error-msg'] = "Invalid username or password.";
            header("location: login.php");
            exit();
        }
        $stmt->close();
}
   