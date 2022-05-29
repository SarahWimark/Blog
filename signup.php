<?php define('TITLE', 'Sign up'); ?>
<?php include_once('./src/includes/header.php'); ?>

<?php

session_start();
// If there is an active session redirect user to index page
if(isset($_SESSION['loggedIn'])) {
    header("Location: index.php");
    exit();
}
;?>

<main>
    <div class="container w-25 mt-5 shadow p-4 bg-white rounded">
        <p class="text-danger"><?php if(!empty($_SESSION['error-msg'])) {echo $_SESSION['error-msg'];}
        ?></p>
        <?php if(!empty($_SESSION['error-msg'])) {unset($_SESSION['error-msg']);}?>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm" name="confirm">
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-secondary" name="register">
                    Sign up <i class="fas fa-user-plus"></i></button>
            </div>
        </form>
        <div><a href="login.php">Already a member?</a></div>
    </div>
</main>

<?php include_once('./src/includes/footer.php'); ?>