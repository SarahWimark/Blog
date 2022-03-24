<?php define('TITLE', 'Login'); ?>
<?php include_once('header.php'); ?>


<main>
    <div class="container w-25 mt-5 shadow p-4">
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mt-2">
        <button type="submit" class="btn btn-success" name="submit">Login</button>
        </div>
    </form>
    </div>
</main>

<?php include_once('footer.php'); ?>