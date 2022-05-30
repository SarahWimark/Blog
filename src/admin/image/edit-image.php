<?php 
define('TITLE', 'Edit image'); 
include_once('../../includes/header.php'); 
include_once('../dashboard.php');
include_once('../../../functions.php');
include_once('../../db/db_queries.php');

 if(isset($_GET['id'])) {
    $id = sanitize($_GET['id']);
    echo $id;
    $image = getById('images', $id);
    if($image['user_id'] != $_SESSION['userId']) {
        header("Location: ../../../index.php");
        exit();  
    }
}  
?>

<div class="manage-buttons">
    <a class="btn btn-success" href="src/admin/image/image.php"> <i class="fa-solid fa-arrow-left"></i> Go back to all
        images</a>
</div>
<div class="clearfix container w-100 mt-5 shadow p-4 bg-white rounded">
    <form action="src/admin/image/image.php?id=<?php echo $image['id']; ?>" method="post">
        <?php if(!empty($_SESSION['error-msg'])) { ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error-msg'];?></div>
        <?php } ?>
        <?php if(!empty($_SESSION['error-msg'])) {unset($_SESSION['error-msg']);}?>
        <div class="form-group">
            <label for="imagedesc" class="mt-2 mb-2">Image description</label>
            <input type="text" value="<?php echo $image['description']; ?>" class="form-control" id="imagedesc"
                name="imagedesc">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-secondary right" name="updateimage">
                Update image <i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>

</div>
<?php include_once('../../includes/footer-small.php');