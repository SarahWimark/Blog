<?php 
define('TITLE', 'Create blog'); 
include_once('../../includes/header.php'); 
include_once('../dashboard.php');
include_once('../../../functions.php');
include_once('../../db/db_queries.php');
 ?>

<div class="manage-buttons">
    <a class="btn btn-success" href="src/admin/blog/blog.php"> <i class="fa-solid fa-arrow-left"></i> Go back</a>
</div>
<div class="clearfix container w-100 mt-5 shadow p-4 bg-white rounded">
    <?php if(!empty($_SESSION['error-msg'])) { ?>
    <div class="alert alert-danger"><?php echo $_SESSION['error-msg'];?></div>
    <?php } ?>
    <?php if(!empty($_SESSION['error-msg'])) {unset($_SESSION['error-msg']);}?>
    <form action="src/admin/blog/blog.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="blogtitle" class="mt-2 mb-2"> Blog title</label>
            <input type="text" class="form-control" id="blogtitle" name="blogtitle">
        </div>
        <div class="form-group">
            <label for="blogtext" class="mt-2 mb-2">Blog description</label>
            <textarea class="form-control" maxlength="250" id="blogtext" name="blogtext"></textarea>
        </div>
        <div class="form-group">
            <label for="blogimage" class="mt-2 mb-2">Blog image</label>
            <select id="blogimage" name="blogimage" class="form-control" onchange="showBlogImage()">
                <?php
        $images = getUsersImages();
        foreach($images as $image):
        ?>
                <option value="<?php echo $image['filename']; ?>"><?php echo $image['filename']; ?>
                </option>
                <?php endforeach; ?>
            </select>
        </div>
        <script type="text/javascript">
        function showBlogImage() {
            const div = document.getElementById('image');
            if (div.hasChildNodes()) {
                let imgages = div.getElementsByTagName('img');
                div.removeChild(imgages[0]);
            }
            let value = document.getElementById("blogimage").value;
            const img = document.createElement('img');
            img.className = 'create-post-image';
            img.src = `src/admin/uploads/${value}`;
            div.appendChild(img);




        }
        </script>
        <div id="image" class="imageDiv"></div>
        <div class="mt-4">
            <button type="submit" class="btn btn-secondary right" name="newblog">
                Create blog <i class="fas fa-user-plus"></i></button>
        </div>
    </form>
</div>

</div>
</div>
<?php include_once('../../includes/footer-small.php');