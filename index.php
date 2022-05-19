<?php define('TITLE', 'Welcome page'); ?>
<?php include_once('./src/includes/header.php'); ?>
<?php include_once('functions.php'); ?>

<?php
 session_start();
// If there is no session redirect user to login page
// if(!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit();
// }

// Checks what button that was pressed and calls the approriate function
if (isset($_POST['register'])) {
    registerUser();
} else if (isset($_POST['submit'])) {
    checkLogin();
} else if (isset($_GET['logout'])) {
    logout();
} else if (isset($_POST['newcategory'])) {
    addNewcategory();
} else if (isset($_POST['newpost'])) {
    addNewPost();
}
?>

<main>
    <?php include_once('./src/blog/includes/carousel.php'); ?>
    <?php include_once('./src/blog/main.php'); ?>
</main>
<?php include_once('./src/includes/footer.php'); ?>