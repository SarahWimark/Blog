<?php
define('TITLE', 'Upload image'); 
include_once(dirname(__FILE__,4) .'/src/includes/header.php'); 
include_once(dirname(__FILE__,4) .'/src/admin/dashboard.php');
include_once(dirname(__FILE__,4) .'/functions.php');
include_once(dirname(__FILE__,4) .'/src/db/db_queries.php');

?>

<div class="manage-buttons">
    <a class="btn btn-success" href="src/admin/image/image.php"> <i class="fa-solid fa-arrow-left"></i> Go back to all
        images</a>
</div>
<div class="clearfix container w-100 mt-5 shadow p-4 bg-white rounded">
    <form action="src/admin/image/image.php" method="post" enctype="multipart/form-data">
        <?php if(!empty($_SESSION['error-msg'])) { ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error-msg'];?></div>
        <?php } ?>
        <?php if(!empty($_SESSION['error-msg'])) {unset($_SESSION['error-msg']);}?>
        <div class="form-group">
            <label for="imagedesc" class="mt-2 mb-2">Image description</label>
            <input type="text" class="form-control" id="imagedesc" name="imagedesc">
        </div>
        <div class="form-group">
            <label for="image" class="mt-3 mb-3">Image: </label>
            <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
            <input type="file" class="form-control-file" name="image">
        </div>
        <div class="mt-4">
            <button type="submit" class="btn btn-secondary right" name="newimage">
                Add new image <i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>

</div>
<?php include_once('../../includes/footer-small.php'); ?>