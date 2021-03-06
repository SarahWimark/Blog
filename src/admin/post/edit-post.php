<?php 
define('TITLE', 'Edit post'); 
include_once(dirname(__FILE__,4) .'/src/includes/header.php'); 
include_once(dirname(__FILE__,4) .'/src/admin/dashboard.php');
include_once(dirname(__FILE__,4) .'/functions.php');
include_once(dirname(__FILE__,4) .'/src/db/db_queries.php');

if(isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    $post = getById('posts', $id);
    if($post['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    }
} 
?>


<div class="manage-buttons">
    <a class="btn btn-success" href="src/admin/post/post.php"> <i class="fa-solid fa-arrow-left"></i> Go back to all
        posts</a>
</div>
<div class="clearfix container w-100 mt-5 shadow p-4 bg-white rounded">
    <form action="src/admin/post/post.php?id=<?php echo $post['id']; ?>" method="post">
        <div class="form-group">
            <label for="title" class="mt-2 mb-2">Title</label>
            <input type="text" value="<?php echo $post['title'];?>" class="form-control" id="title" name="title"
                required>
        </div>
        <div class="form-group">
            <label for="text" class="mt-2 mb-2">Text</label>
            <textarea class="form-control" rows="10" id="text" name="text"
                required><?php echo $post['text'];?></textarea>
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-secondary right" name="updatepost">
                Update post <i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>

</div>
</div>
<?php include_once(dirname(__FILE__, 4) .'/src/includes/footer-small.php'); ?>