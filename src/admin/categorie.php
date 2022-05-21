<?php
define('TITLE', 'Admin categories'); 
include_once('../includes/header.php'); 
include_once('./dashboard.php'); 
include_once('../../functions.php');
include_once('../db/db_queries.php');
?>

<?php
if (isset($_POST['newcategory'])) {
    addNewCategory();
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
        <?php
        $categories = getCategories();
        if(!$categories) {
            echo "No categories found";
        }
        foreach($categories as $category):
        ?>
        <tr>
            <td><?php echo $category['category_name']; ?>
            </td>
            <td></td>
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