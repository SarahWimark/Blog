<?php 
define('TITLE', 'Create post'); 
include_once('../includes/header.php'); 
include_once('./dashboard.php');
include_once('../../functions.php');
include_once('../db/db_queries.php');
 ?>

<div class="manage-buttons">
    <a class="btn btn-success" href="src/admin/post.php"> <i class="fa-solid fa-arrow-left"></i> Go back to all
        posts</a>
</div>
<div class="clearfix container w-100 mt-5 shadow p-4 bg-white rounded">
    <form action="src/admin/post.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title" class="mt-2 mb-2">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="text" class="mt-2 mb-2">Text</label>
            <textarea class="form-control" id="text" name="text" required></textarea>
        </div>
        <div class="form-group">
            <label for="title" class="mt-2 mb-2">Topic</label>
            <select name="posttopic" class="form-control" required>
                <?php
        $categories = getCategories();
        if(!$categories) {
            echo "No categories found";
        }
        foreach($categories as $category):
        ?>
                <option value="<?php echo $category['category_name']; ?>"><?php echo $category['category_name']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="postimage" class="mt-3 mb-3">Image: </label>
            <input type="file" class="form-control-file" id="postimage" name="postimage">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-secondary right" name="newpost">
                Add new post <i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>

</div>
</div>
<?php include_once('../includes/footer-small.php'); ?>