<?php define('TITLE', 'Admin images'); 
include_once(dirname(__FILE__,4) .'/src/includes/header.php'); 
include_once(dirname(__FILE__,4) .'/src/admin/dashboard.php');
include_once(dirname(__FILE__,4) .'/functions.php');
include_once(dirname(__FILE__,4) .'/src/db/db_queries.php');

?>

<?php
// Checks what button was pressed and calls the appropriate function and that you cant update or delete another users material
if (isset($_POST['newimage'])) {
  addNewImage();
} else if (isset($_GET['delete']) && isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    $image = getById('images', $id);
    if($image['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    } else {
        delete('images', $id);
    }
} else if (isset($_POST['updateimage']) && isset($_POST['imagedesc']) && isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    $description = sanitize($_POST['imagedesc']);
    $image = getById('images', $id);
    if($image['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    } else {
        $_SESSION['success-msg'] = "Image was sucessfully updated.";
        updateImage($id,$description);
    }
}
?>
<div class="manage-buttons">
    <a class="btn btn-secondary" href="src/admin/image/upload-image.php"><i class="fas fa-plus"></i> Add new image</a>
</div>
<div class="mt-2 alert alert-danger">WARNING - use delete with care! Deleting an image you uploaded will also delete the
    posts and the blog
    that
    the
    image is used in.</div>
<?php if(!empty($_SESSION['success-msg'])) { ?>
<div class="mt-4 alert alert-success"><?php echo $_SESSION['success-msg'];?></div>
<?php } ?>
<?php if(!empty($_SESSION['success-msg'])) {unset($_SESSION['success-msg']);}?>
<table class="table mt-3 table-striped table-hover">
    <thead>
        <tr>
            <th>Image</th>
            <th>Description</th>
            <th>Date Created</th>
            <th>Edit/Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $images = getUsersImages();
        if(!$images) { ?>
        <p class="error-msg">No images found.</p>
        <?php } 
        foreach($images as $image):
        ?>
        <tr>

            <td><img src="src/admin/uploads/<?php echo $image['filename']; ?>" class="avatar"
                    alt="<?php echo $image['description']; ?>"></td>
            <td><?php echo $image['description']; ?></td>
            <td><?php echo $image['created_at']; ?></td>
            <td>
                <a href="src/admin/image/edit-image.php?id=<?php echo $image['id']; ?>" class="settings" title="Edit"
                    data-toggle="tooltip"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="src/admin/image/image.php?id=<?php echo $image['id']; ?>&delete=true" class="delete"
                    title="Delete" data-toggle="tooltip" name="delete"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>

<?php include_once(dirname(__FILE__, 4) .'/src/includes/footer-small.php'); ?>