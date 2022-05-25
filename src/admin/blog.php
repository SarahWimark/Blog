<?php define('TITLE', 'Admin blog'); 
include_once('../includes/header.php'); 
include_once('./dashboard.php');
include_once('../../functions.php');
include_once('../db/db_queries.php');
?>

<?php
if (isset($_POST['newblog'])) {
    addNewBlog();
}
?>

<div class="manage-buttons">
    <a class="btn btn-secondary" href="src/admin/create-blog.php"> <i class="fas fa-plus"></i> Create blog</a>
</div>
<table class="table mt-3 table-striped table-hover">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Edit/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $blogs = getUsersBlog();
        if(!$blogs) {
            echo "No blog found";
        }
        foreach($blogs as $blog):
         $image = getById('images', $blog['image_id']);
        ?>
        <tr>
            <td><img src="src/admin/uploads/<?php echo $image['filename']; ?>" class="avatar" alt="Avatar"></td>
            <td><a href="#"><?php echo $blog['title']; ?></a></td>
            <td><?php echo $blog['description']; ?></td>
            <td><?php echo $blog['created_at']; ?></td>
            <td>
                <a href="#" class="settings" title="Edit" data-toggle="tooltip"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

<?php include_once('../includes/footer-small.php'); ?>