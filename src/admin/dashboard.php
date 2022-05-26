<?php 
session_start();
if(!isset($_SESSION['loggedIn'])) {
    header("Location: ../../login.php");
    exit();  
}
?>

<div class="admin-content">
    <div class="admin-sidebar">
        <ul>
            <li><a href="src/admin/post/post.php">My Posts</a></li>
            <li><a href="src/admin/image/image.php">My Images</a></li>
            <li><a href="src/admin/blog/blog.php">My Blog</a></li>
        </ul>
    </div>
    <div class="admin-dashboard">