<?php define('TITLE', 'Login'); ?>
<?php include_once('./src/includes/header.php'); ?>


<main>
    <div class="container w-25 mt-5 shadow p-4 bg-white rounded">
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mt-2 right">
                <button type="submit" class="btn btn-secondary" name="submit">
                    Login <i class="fa fa-arrow-right-to-bracket"></i></button>
            </div>
        </form>
        <div class="right"><a href="signup.php">Signup instead?</a></div>
        <div class="right"><a href="#">Forgot password?</a></div>

    </div>
</main>

<?php include_once('./src/includes/footer.php'); ?>