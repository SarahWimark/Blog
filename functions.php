<?php
// create session
session_start();

// Checks the users input and prints a message to the user if credentials are wrong
function validateUserInput($password, $username)
{
    if (empty($password) && empty($username)) {
        $_SESSION['error-msg'] = 'Ange ett lösenord och användarnamn';
    } else if (empty($password)) {
        $_SESSION['error-msg'] = 'Ange ett lösenord';
    } else if (strlen($password) < 6) {
        $_SESSION['error-msg'] = 'Lösenordet måste vara minst 6 tecken långt.';
    } else if (empty($username)) {
        $_SESSION['error-msg'] = 'Ange ett användarnamn';
    } else if (strlen($username) < 3) {
        $_SESSION['error-msg'] = 'Användarnamnet måste vara minst 3 tecken långt.';
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
    echo 'Reached';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $credentials = getCredentials();
    }

    validateUserInput($password, $username);

    foreach ($credentials as $un => $pw) {
        if (password_verify($password, $pw) && $un == $username) {
            $_SESSION['username'] = $username;
            $_SESSION['loggedIn'] = true;
            header('location: index.php');
            exit();
        } else {
            $_SESSION['error-msg'] = "Användarnamnet eller lösenordet är felaktigt";
        }
    }
}

// Register a new user and save the credentials to a file if username
// isn´t already saved in the file. If successful register user are logged in.
function registerUser()
{
   if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $credentials = getCredentials();
    }
    validateUserInput($password, $username);
   $pw_hash = password_hash($password, PASSWORD_DEFAULT);

    if(empty($_SESSION['error-msg']) ) {
        if (userExist($credentials, $username)) {
            $_SESSION['error-msg'] = "Användaren finns redan";
        } else {
            $file = fopen("userInfo.txt", "a") or die("Unable to open file!");
            $usersInfo = "$username:$pw_hash\n";
            fwrite($file, $usersInfo);
            fclose($file);
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        }
    }
}

// Logs out the current user and destroys the current session.
function logout()
{
    session_destroy();
    unset($_SESSION['username']);
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