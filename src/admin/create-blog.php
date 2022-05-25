<?php 
define('TITLE', 'Create blog'); 
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
    <form action="src/admin/blog.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="blogtitle" class="mt-2 mb-2"> Blog title</label>
            <input type="text" class="form-control" id="blogtitle" name="blogtitle" required>
        </div>
        <div class="form-group">
            <label for="blogtext" class="mt-2 mb-2">Blog description</label>
            <textarea class="form-control" rows="10" id="blogtext" name="blogtext" required></textarea>
        </div>
        <div class="form-group">
            <label for="blogimage" class="mt-2 mb-2">Blog image</label>
            <select name="blogimage" class="form-control" required>
                <?php
        $images = getUsersImages();
        if(!$images) {
            echo "No images found";
        }
        foreach($images as $image):
        ?>
                <option value="<?php echo $image['filename']; ?>"><?php echo $image['filename']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php if(!empty($_POST['postimage'])){ 
             $selected = $_POST['postimage']; 
              ?>
        <img src="src/admin/uploads/<?php echo $selected ?>">
        <?php } ?>
        <div class="mt-4">
            <button type="submit" class="btn btn-secondary right" name="newblog">
                Create blog <i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>

</div>
</div>
<?php include_once('../includes/footer-small.php'); ?>