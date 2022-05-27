<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="src/images/favicon.ico">
    <script src="https://kit.fontawesome.com/1a8500da42.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Oswald:wght@400;700&display=swap"
        rel="stylesheet">
    <base href="http://localhost/Projekt/blog/" />
    <script src="src/js/script.js" defer></script>
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="stylesheet" href="src/styles/footer.css">
    <link rel="stylesheet" href="src/styles/blog.css">
    <link rel="stylesheet" href="src/styles/main.css">
    <link rel="stylesheet" href="src/styles/admin.css">
    <title><?php echo TITLE; ?></title>
</head>

<body>
    <div class="main_container">
        <header id="main-header">
            <div class="logo">
                <h1 class="logo-title"><a href="index.php"><span>Alacer</span>Blogs</a></h1>
            </div>
            <nav>
                <ul class="navigation">
                    <li><a href="index.php">Home</a></li>
                    <?php
                    if(!$_SESSION['loggedIn']){
                    ?>
                    <li><a href="signup.php">Sign up</a></li>
                    <li><a href="login.php">Login</a></li>
                    <?php
                    } ?>
                    <?php
                    if($_SESSION['username']){
                    ?>
                    <li><a href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <i
                                class="fa fa-chevron-down"></i></a>

                        <ul class="sub-navigation bg-secondary">
                            <li><a href="src/admin/post/post.php">Dashboard</a></li>
                            <li><a href="index.php?logout=true">Logout</a></li>
                        </ul>
                    </li>
                    <?php
                    } ?>

                </ul>
            </nav>
        </header>