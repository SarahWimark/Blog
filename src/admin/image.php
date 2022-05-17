<?php define('TITLE', 'Admin images'); ?>
<?php include_once('../includes/header.php'); ?>

<?php include_once('./dashboard.php'); ?>
<div class="manage-buttons">
    <a class="btn btn-secondary" href="src/admin/upload-image.php"><i class="fas fa-plus"></i> Add new image</a>
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

        <tr>
            <td><img src="src/images/uploads/unsplash.jpg" class="avatar" alt="Avatar"></td>
            <td><a href="#">Descriptive text</a></td>
            <td>12/08/2017</td>
            <td>
                <a href="#" class="settings" title="Edit" data-toggle="tooltip"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <tr>
            <td><img src="src/images/uploads/unsplash.jpg" class="avatar" alt="Avatar"></td>
            <td><a href="#">Descriptive text</a></td>
            <td>12/08/2017</td>
            <td>
                <a href="#" class="settings" title="Edit" data-toggle="tooltip"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <tr>
            <td><img src="src/images/uploads/unsplash.jpg" class="avatar" alt="Avatar"></td>
            <td><a href="#">Descriptive text</a></td>
            <td>12/08/2017</td>
            <td>
                <a href="#" class="settings" title="Edit" data-toggle="tooltip"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
    </tbody>
</table>
</div>
</div>

<?php include_once('../includes/footer-small.php'); ?>