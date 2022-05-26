<?php define('TITLE', 'Admin posts'); 
include_once('../../includes/header.php'); 
include_once('../dashboard.php');
include_once('../../../functions.php');
include_once('../../db/db_queries.php');
?>

<?php
if (isset($_POST['newpost'])) {
    addNewPost();
} else if (isset($_POST['delete']) && isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    echo $id;
    $post = getById('posts', $id);
    if($post['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    } else {
        delete('posts', $id);
    }
} else if (isset($_POST['updatepost']) && isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    echo $id;
    $post = getById('posts', $id);
    if($post['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    } else {
        updatePost($id);
    }
}
?>

<div class="manage-buttons">
    <a class="btn btn-secondary" href="src/admin/post/create-post.php"> <i class="fas fa-plus"></i> Add new post</a>
</div>
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
        $posts = getUsersPosts();
        if(!$posts) {
            echo "No posts found";
        }
        foreach($posts as $post):
         $image = getById('images', $post['image_id']);
         $topic = getById('categories', $post['category_id']);
        ?>
        <tr>
            <td><img src="src/admin/uploads/<?php echo $image['filename']; ?>" class="avatar" alt="Avatar"></td>
            <td><a href="src/blog/includes/content.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
            </td>
            <td><?php echo $topic['category_name']; ?></td>
            <td><?php echo $post['created_at']; ?></td>
            <td>
                <a href="src/admin/post/edit-post.php?id=<?php echo $post['id']; ?>" class="settings" title="Edit"
                    data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="src/admin/post/post.php?id=<?php echo $post['id']; ?>" class="delete" title="Delete"
                    data-toggle="tooltip"><i class="fa-solid fa-trash-can" name="delete"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

<?php include_once('../../includes/footer-small.php');