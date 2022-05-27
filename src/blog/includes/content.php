<?php 
define('TITLE', 'Blog page'); 
include_once('../../includes/header.php'); 
include_once('../../../functions.php'); 
include_once('../../db/db_queries.php'); 

if(isset($_GET['id']) && isset($_GET['blog'])) {
    $id = sanitize($_GET['id']);
    $blog = getById('blogs', $id);
    $image = getById('images', $blog['image_id']);
    $user = getById('users', $blog['user_id']);
    $posts = getUsersPosts($blog['user_id']);
} 


?>

<main>
    <div class="content post-content clearfix">
        <aside class="sidebar right post-sidebar">

            <section class="blog-info">
                <h2 class="blog-title"><?php echo $user['username'];?></h2>
                <hr>
                <div class="blogger-info">
                    <img src="src/admin/uploads/<?php echo $image['filename']; ?>"
                        alt="<?php echo $image['description']; ?>">
                    <hr>
                    <p class="blog-decription"><?php echo $blog['description']; ?></p>
                </div>
            </section>

            <section class="recent clearfix ">
                <h2 class="recent-title">Latests posts</h2>
                <?php
                    foreach($posts as $post):
                    $postImage = getById('images', $post['image_id']);
                ?>
                <div class="recent-post clearfix">
                    <img src="src/admin/uploads/<?php echo $postImage['filename']; ?>"
                        alt="<?php echo $postImage['description']; ?>" class="left">
                    <a href="#" class="recent-link"><?php echo $post['title']; ?></a>
                </div>
                <?php endforeach; ?>
            </section>
        </aside>
        <?php
        foreach($posts as $post):
            $postimage = getById('images', $post['image_id']);
        ?>

        <div class="blog-post-section">
            <h2 class="post-title"><?php echo $post['title']; ?></h2>
            <div class="post-content">
                <img src="src/admin/uploads/<?php echo $postimage['filename']; ?>"
                    alt="<?php echo $image['description']; ?>" class="post-image">
                <p><?php echo $post['text']; ?></p>
            </div>
        </div>
        <?php endforeach; ?>



    </div>
</main>
<?php include_once('../../includes/footer.php'); ?>