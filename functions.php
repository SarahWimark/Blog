<?php
include_once("./src/db/db_queries.php");
// create session
session_start();

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
    echo "Reached";
    
    userCredentials($username, $password);
    echo $_SESSION['username'];
    
        //       // Password is correct, so start a new session
        //       session_start();
                
        //       // Store data in session variables
        //       $_SESSION["loggedIn"] = true;
        //       $_SESSION["username"] = $username;                            
              
        //       // Redirect user to welcome page
        //       header("location: index.php");
        //       exit();
        //   } else{
        //       // Username doesn't exist, display a generic error message
        //       $_SESSION['error-msg'] = "Invalid username or password.";
        //    }

    // foreach ($credentials as $un => $pw) {
    //     if (password_verify($password, $pw) && $un == $username) {
    //         $_SESSION['username'] = $username;
    //         $_SESSION['loggedIn'] = true;
    //         header('location: index.php');
    //         exit();
    //     } else {
    //         $_SESSION['error-msg'] = "Användarnamnet eller lösenordet är felaktigt";
    //     }
    // }
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

    /* if(empty($_SESSION['error-msg']) ) {
        if (userExist($credentials, $username)) {
            $_SESSION['error-msg'] = "Användaren finns redan";
        } else { */
            insertNewUser($username, $email, $pw_hash);
            //$_SESSION['username'] = $username;
            header("Location: login.php");
            exit();
        // }
    }


// Logs out the current user and destroys the current session.
function logout()
{
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['loggedIn']);
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

// Check if a username already exists in the file
function userExist($credentials, $username): bool{
    foreach ($credentials as $un => $pw) {
        if ($un == $username) {
            return true;
        }
    }
    return false;
}

?>