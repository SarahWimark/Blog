<?php define('TITLE', 'Admin images'); 
include_once('../../includes/header.php'); 
include_once('../dashboard.php');
include_once('../../../functions.php');
include_once('../../db/db_queries.php');
?>

<?php
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
}else if (isset($_POST['updateimage']) && isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    $image = getById('images', $id);
    if($image['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    } else {
        updateImage($id);
    }
}
?>
<div class="manage-buttons">
    <a class="btn btn-secondary" href="src/admin/image/upload-image.php"><i class="fas fa-plus"></i> Add new image</a>
</div>
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
        if(!$images) {
            echo "No images found";
        }
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

<?php include_once('../../includes/footer-small.php');