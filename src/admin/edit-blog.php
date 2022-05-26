<?php 
define('TITLE', 'Edit blog'); 
include_once('../includes/header.php'); 
include_once('./dashboard.php');
include_once('../../functions.php');
include_once('../db/db_queries.php');

if(isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    echo $id;
    $blog = getById('blogs', $id);
    if($blog['user_id'] != $_SESSION['userId']) {
        header("Location: ../../index.php");
        exit();  
    }
} 
 ?>

<div class="manage-buttons">
    <a class="btn btn-success" href="src/admin/blog.php"> <i class="fa-solid fa-arrow-left"></i> Go back to all
        blogs</a>
</div>
<div class="clearfix container w-100 mt-5 shadow p-4 bg-white rounded">
    <form action="src/admin/blog.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="blogtitle" class="mt-2 mb-2"> Blog title</label>
            <input type="text" value="<?php echo $blog['title']; ?>" class="form-control" id="blogtitle"
                name="blogtitle" required>
        </div>
        <div class="form-group">
            <label for="blogtext" class="mt-2 mb-2">Blog description</label>
            <textarea class="form-control" maxlength="250" id="blogtext" name="blogtext"
                required><?php echo $blog['description']; ?></textarea>
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
        <div class="mt-4">
            <button type="submit" class="btn btn-secondary right" name="updateblog">
                Update blog <i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>

</div>
</div>
<?php include_once('../includes/footer-small.php'); ?>