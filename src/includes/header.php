<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="utf-8" />
    <link href="style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1a8500da42.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="stylesheet" href="src/styles/blog.css">
    <link rel="stylesheet" href="src/styles/main.css">
    <title><?php echo TITLE; ?></title>
</head>

<body>
    <div class="main_container">
        <header id="main-header">
            <div class="logo">
                <h1 class="logo-title">LogoTitle</h1>
            </div>
            <nav>
                <ul class="navigation">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="signup.php">Sign up</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="#">Logged in user</a>
                        <ul>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#" class="text-danger">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>