<?php define('TITLE', 'Admin posts'); 
include_once(dirname(__FILE__,4) .'/src/includes/header.php'); 
include_once(dirname(__FILE__,4) .'/src/admin/dashboard.php');
include_once(dirname(__FILE__,4) .'/functions.php');
include_once(dirname(__FILE__,4) .'/src/db/db_queries.php');
?>

<?php
// Checks what button was pressed and calls the appropriate function and that you cant update or delete another users material
if (isset($_POST['newpost'])) { 
    addNewPost();
} else if (isset($_GET['delete']) && isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    $post = getById('posts', $id);
    if($post['user_id'] != $_SESSION['userId']) {
        $path = dirname(__FILE__, 1);
        header("Location:  $path/403.php");
        exit();  
    } else {
        delete('posts', $id);
    }
} else if (isset($_POST['updatepost']) && isset($_GET['id']) && isset($_POST['title']) && isset($_POST['text'])) {
    $id = sanitize($_GET['id']);
    $title = sanitize($_POST['title']);
    $text = sanitize($_POST['text']);
    $post = getById('posts', $id);
    if($post['user_id'] != $_SESSION['userId']) {
        $path = dirname(__FILE__, 1);
        header("Location:  $path/403.php");
        exit();  
    } else {
        $_SESSION['success-msg'] = "Post was sucessfully updated.";
        updatePost($title, $text, $id);
    }
}

$blog = getUsersBlog($_SESSION['userId']);

if($blog) { ?>
<div class="manage-buttons">
    <a class="btn btn-secondary" href="src/admin/post/create-post.php"> <i class="fas fa-plus"></i> Create post</a>
</div>
<?php } else { ?>
<p class="error-msg">Create a blog to start adding posts</p>
<?php } ?>
<?php if(!empty($_SESSION['success-msg'])) { ?>
<div class="mt-4 alert alert-success"><?php echo $_SESSION['success-msg'];?></div>
<?php } ?>
<?php if(!empty($_SESSION['success-msg'])) {unset($_SESSION['success-msg']);}?>
<table class="table mt-3 table-striped table-hover">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Topic</th>
            <th>Date Created</th>
            <th>Edit/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $posts = getUsersPosts($_SESSION['userId']);
        if(!$posts) { ?>
        <p class="error-msg">No posts found.</p>
        <?php }
        foreach($posts as $post):
         $image = getById('images', $post['image_id']);
         $topic = getById('categories', $post['category_id']);
        ?>
        <tr>
            <td><img src="src/admin/uploads/<?php echo $image['filename']; ?>" class="avatar" alt="Avatar"></td>
            <td><a
                    href="src/blog/includes/content.php?id=<?php echo $post['id']; ?>&single=true"><?php echo $post['title']; ?></a>
            </td>
            <td><?php echo $topic['category_name']; ?></td>
            <td><?php echo $post['created_at']; ?></td>
            <td>
                <a href="src/admin/post/edit-post.php?id=<?php echo $post['id']; ?>" class="settings" title="Edit"
                    data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="src/admin/post/post.php?id=<?php echo $post['id']; ?>&delete=true" class="delete"
                    title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash-can" name="delete"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

<?php include_once(dirname(__FILE__, 4) .'/src/includes/footer-small.php'); ?>