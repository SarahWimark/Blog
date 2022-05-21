<?php define('TITLE', 'Create categorie'); ?>
<?php include_once('../includes/header.php'); ?>
<?php include_once('./dashboard.php'); ?>

<div class="manage-buttons">
    <a class="btn btn-success" href="src/admin/categorie.php"> <i class="fa-solid fa-arrow-left"></i> Go back to all
        categories</a>
</div>
<div class="clearfix container w-100 mt-5 shadow p-4 bg-white rounded">
    <form action="src/admin/categorie.php" method="post">
        <div class="form-group">
            <label for="categoryname" class="mt-2 mb-2">Category name</label>
            <input type="text" class="form-control" id="categoryname" name="categoryname" required>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-secondary right" name="newcategory">
                Add new category <i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>

</div>
</div>
<?php include_once('../includes/footer-small.php'); ?>