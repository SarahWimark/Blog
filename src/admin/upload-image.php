<?php define('TITLE', 'Upload image'); ?>
<?php include_once('../includes/header.php'); ?>

<?php include_once('./dashboard.php'); ?>
<div class="manage-buttons">
    <a class="btn btn-success" href="src/admin/image.php"> <i class="fa-solid fa-arrow-left"></i> Go back to all
        images</a>
</div>
<div class="container w-25 mt-5 shadow p-4 bg-white rounded">
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="email" name="email">
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
</div>
</div>
<?php include_once('../includes/footer-small.php'); ?>