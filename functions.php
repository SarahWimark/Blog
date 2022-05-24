<?php
include_once("./src/db/db_queries.php");
// create session
session_start();

$upload_errors = array(
    // http://www.php.net/manual/en/features.file-upload.errors.php
    UPLOAD_ERR_OK          => "Inga fel.",
    UPLOAD_ERR_INI_SIZE    => "Filen är större än den storlek som anges i php.ini (upload_max_filesize).",
    UPLOAD_ERR_FORM_SIZE   => "Filen är större än den största filstorlek som angets i formuläret (MAX_FILE_SIZE).",
    UPLOAD_ERR_PARTIAL     => "Filen blev delvis uppladdad.",
    UPLOAD_ERR_NO_FILE     => "Ingen fil är vald.",
    UPLOAD_ERR_NO_TMP_DIR  => "Ingen temporär katalog finns på webbservern.",
    UPLOAD_ERR_CANT_WRITE  => "Kan inte skriva till disk.",
    UPLOAD_ERR_EXTENSION   => "Filuppladdningen är stoppad av ett tillägg (extension)."
);

// Checks the users input and prints a message to the user if credentials are wrong
function validateUserInput($password, $confirmPW, $username, $email)
{
    if (empty($username)) {
        $_SESSION['error-msg'] = 'Enter a valid username';
    } else if (empty($password)) {
        $_SESSION['error-msg'] = 'Enter a valid password';
    } else if (strlen($password) < 6) {
        $_SESSION['error-msg'] = 'Password has to be atleast 6 characters long';
    } else if (empty($email)) {
        $_SESSION['error-msg'] = 'Enter a valid email';
    } else if (strlen($username) < 3) {
        $_SESSION['error-msg'] = 'Användarnamnet måste vara minst 3 tecken långt.';
    } else if (strcmp($password, $confirmPW == 0)) {
        $_SESSION['error-msg'] = 'Passwords has to match';
    }
}

function validateEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error-msg'] = 'Enter a valid email';
    }
}

// Get the content of the file with username and passwords
function getCredentials(): array
{
    $lines = explode("\n", file_get_contents('userInfo.txt'));
    $credentials = array();

    foreach ($lines as $line) {
        $lineArr = explode(':', $line);
        $username = $lineArr[0];
        $password = $lineArr[1];
        $credentials[$username] = $password;
    }
    return $credentials;
}

// Check if the provided credentials matches the username and
// password saved in the file and if a match logs in the user
function checkLogin()
{
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
    }
   
    validateUserInput($password,"", $username,"");
    userCredentials($username, $password);
}


// Register a new user 
function registerUser()
{
   if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['confirm'])) {
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $email = sanitize($_POST['email']);
        $confirmPW = sanitize($_POST['confirm']);
    }
    validateUserInput($password, $confirmPW, $username, $email);
    validateEmail($email);
    $pw_hash = password_hash($password, PASSWORD_DEFAULT);
    insertNewUser($username, $email, $pw_hash);
    header("Location: login.php");
    exit();    
}


// Logs out the current user and destroys the current session.
function logout()
{
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['loggedIn']);
    unset($_SESSION['userId']);
    header("location: login.php");
    exit();
}

// Cleans the user input
function sanitize($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function addNewCategory() {
       if (!isset($_POST['categoryname']) && empty($_POST['categoryname']) ) {
        $_SESSION['error-msg'] = 'Enter a valid category name';
           
       } else {
        $categoryName = sanitize($_POST['categoryname']);
        insertNewCategory($categoryName);
    }
}

function getCategories() {
    $allCategories = getAllFromTable('categories');
    return $allCategories;
}


function addNewPost() {
    if (isset($_POST['title']) && isset($_POST['text']) && isset($_POST['posttopic']) && isset($_POST['postimage'])) {
       $title = sanitize($_POST['title']);
       $text = sanitize($_POST['text']);
       $topic = sanitize($_POST['posttopic']);
       $image = sanitize($_POST['postimage']);
       insertNewPost($title, $text, $topic, $image);    
       } else {
        $_SESSION['error-msg'] = 'Enter valid credentials';
       }
}  


function addNewImage() {
    if (isset($_POST['imagedesc']) && $_FILES['image']['size'] > 0) {
        $tmp_filename = $_FILES['image']['tmp_name'];
        $upload_dir = "uploads/";
        $fileName = basename($_FILES['image']['name']);

        if(move_uploaded_file($tmp_filename, $upload_dir . $fileName)) {
            $_SESSION['success_msg'] = "File was sucessfully uploaded";
        } else {
            $error = $_FILES['image']['error'];
            $message = $upload_errors[$error];
            echo $message;
        }
        $description = sanitize($_POST['imagedesc']);
        insertNewImage($fileName, $description);    
        } else {
         $_SESSION['error-msg'] = 'Enter valid credentials';
    }   
} 
?>