<?php define('TITLE', 'Admin categories'); ?>
<?php include_once('../includes/header.php'); ?>

<?php include_once('./dashboard.php'); ?>
<div class="manage-buttons">
    <a class="btn btn-secondary" href="">Add new category</a>
    <a class="btn btn-success" href="">Manage categories</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Date Created</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Michael Holz</a></td>
            <td>04/10/2013</td>
            <td>Admin</td>
            <td><span class="status text-success">&bull;</span> Active</td>
            <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                        class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="material-icons">&#xE5C9;</i></a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><a href="#"><img src="/examples/images/avatar/2.jpg" class="avatar" alt="Avatar"> Paula Wilson</a></td>
            <td>05/08/2014</td>
            <td>Publisher</td>
            <td><span class="status text-success">&bull;</span> Active</td>
            <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                        class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="material-icons">&#xE5C9;</i></a>
            </td>
        </tr>
        <tr>
            <td>3</td>
            <td><a href="#"><img src="/examples/images/avatar/3.jpg" class="avatar" alt="Avatar"> Antonio Moreno</a>
            </td>
            <td>11/05/2015</td>
            <td>Publisher</td>
            <td><span class="status text-danger">&bull;</span> Suspended</td>
            <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                        class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="material-icons">&#xE5C9;</i></a>
            </td>
        </tr>
        <tr>
            <td>4</td>
            <td><a href="#"><img src="/examples/images/avatar/4.jpg" class="avatar" alt="Avatar"> Mary Saveley</a></td>
            <td>06/09/2016</td>
            <td>Reviewer</td>
            <td><span class="status text-success">&bull;</span> Active</td>
            <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                        class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="material-icons">&#xE5C9;</i></a>
            </td>
        </tr>
        <tr>
            <td>5</td>
            <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar" alt="Avatar"> Martin Sommer</a></td>
            <td>12/08/2017</td>
            <td>Moderator</td>
            <td><span class="status text-warning">&bull;</span> Inactive</td>
            <td>
                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                        class="material-icons">&#xE8B8;</i></a>
                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                        class="material-icons">&#xE5C9;</i></a>
            </td>
        </tr>
    </tbody>
</table>
<div class="clearfix">
    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
    <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>
        <li class="page-item"><a href="#" class="page-link">1</a></li>
        <li class="page-item"><a href="#" class="page-link">2</a></li>
        <li class="page-item active"><a href="#" class="page-link">3</a></li>
        <li class="page-item"><a href="#" class="page-link">4</a></li>
        <li class="page-item"><a href="#" class="page-link">5</a></li>
        <li class="page-item"><a href="#" class="page-link">Next</a></li>
    </ul>
</div>
</div>
</div>
<?php include_once('../includes/footer-small.php'); ?>