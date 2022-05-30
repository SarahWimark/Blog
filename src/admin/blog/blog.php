<?php define('TITLE', 'Admin blog'); 
include_once('../../includes/header.php'); 
include_once('../dashboard.php');
include_once('../../../functions.php');
include_once('../../db/db_queries.php');
?>

<?php
if (isset($_POST['newblog'])) {
    addNewBlog();
} else if (isset($_GET['delete']) && isset($_GET['id'])) {
    $id = sanitize($_GET['id']); 
    $blog = getById('blogs', $id);
    if($blog['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    } else {
        deleteBlog($id);
    }
}else if (isset($_POST['updateblog']) && isset($_POST['blogtitle']) && isset($_POST['blogtext']) && isset($_POST['blogimage'])&& isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    $title = sanitize($_POST['blogtitle']);
    $description = sanitize($_POST['blogtext']);
    $filename = sanitize($_POST['blogimage']);
    $imageId = getImageId($filename);
    $blog = getById('blogs', $id);
    if($blog['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    } else {
        updateBlog($title, $description, $imageId, $id);
    }
}
$blogs = getUsersBlog($_SESSION['userId']);
if(!$blogs) { ?>
<p class="error-msg">No blogs found.</p>
<div class="manage-buttons">
    <a class="btn btn-secondary" href="src/admin/blog/create-blog.php"> <i class="fas fa-plus"></i> Create blog</a>
</div>
<?php } ?>
<table class="table mt-3 table-striped table-hover">
    <thead>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Edit/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
      
        foreach($blogs as $blog):
         $image = getById('images', $blog['image_id']);
        ?>
        <tr>
            <td><img src="src/admin/uploads/<?php echo $image['filename']; ?>" class="avatar" alt="Avatar"></td>
            <td><a
                    href="../../../blog/includes/content.php?id=<?php echo $blog['id']; ?>"><?php echo $blog['title']; ?></a>
            </td>
            <td><?php echo $blog['description']; ?></td>
            <td>
                <a href="src/admin/blog/edit-blog.php?id=<?php echo $blog['id']; ?>" class="settings" title="Edit"
                    data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="src/admin/blog/blog.php?id=<?php echo $blog['id']; ?>&delete=true" class="delete"
                    title="Delete" data-toggle="tooltip"><i class="fa-solid fa-trash-can" name="delete"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

<?php include_once('../../includes/footer-small.php');