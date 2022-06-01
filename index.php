<?php define('TITLE', 'Welcome page'); ?>
<?php include_once('path.php'); ?>
<?php include_once(ROOT_PATH .'/src/includes/header.php'); ?>
<?php include_once('functions.php'); ?>
<?php include_once(ROOT_PATH .'/src/db/db_queries.php'); ?>

<?php
 if(!isset($_SESSION)) 
 { 
     session_start(); 
 } 

// Checks what button that was pressed and calls the approriate function
if (isset($_POST['register'])) {
    registerUser();
} else if (isset($_POST['submit'])) {
    checkLogin();
} else if (isset($_GET['logout'])) {
    logout();
}
?>

<main>
    <?php include_once(ROOT_PATH .'/src/blog/includes/carousel.php'); ?>
    <?php include_once('./src/blog/includes/main.php'); ?>
</main>
<?php include_once(ROOT_PATH .'/src/includes/footer.php'); ?>