<?php
define('TITLE', 'Admin categories'); 
include_once('../includes/header.php'); 
include_once('./dashboard.php'); 
include_once('../../functions.php');
include_once('../db/db_queries.php');

?>
<?php
if (isset($_POST['newcategory'])) {
    addNewcategory();
}
?>

<div class="manage-buttons">
    <a class="btn btn-secondary" href="src/admin/create-categorie.php"> <i class="fas fa-plus"></i> Add new category</a>
</div>
<table class="table mt-3 table-striped table-hover">
    <thead>
        <tr>
            <th>Categories</th>
            <th></th>
            <th>Edit/Delete</th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td><a href="#">Category</a></td>
            <td></td>
            <td>
                <a href="#" class="settings" title="Edit" data-toggle="tooltip"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <tr>
            <td><a href="#">Category</a></td>
            <td>12/08/2017</td>
            <td>
                <a href="#" class="settings" title="Edit" data-toggle="tooltip"><i
                        class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        <tr>
            <td><a href="#">Category</a></td>
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