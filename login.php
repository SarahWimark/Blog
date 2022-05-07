<?php define('TITLE', 'Login'); ?>
<?php include_once('./src/includes/header.php'); ?>

<?php

session_start();
// If there is an active session redirect user to index page
if(isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
;?>

<main>
    <div class="container w-25 mt-5 shadow p-4 bg-white rounded">
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-secondary" name="submit">
                    Login <i class="fa fa-arrow-right-to-bracket"></i></button>
            </div>
        </form>

        <div><a href="signup.php">Signup instead?</a></div>
        <div><a href="#">Forgot password?</a></div>


    </div>
</main>

<?php include_once('./src/includes/footer.php'); ?>