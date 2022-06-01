<?php 
define('TITLE', 'Blog page'); 
include_once('../../includes/header.php'); 
include_once('../../../functions.php'); 
include_once('../../db/db_queries.php'); 

if(isset($_GET['id']) && isset($_GET['all'])) {
    $id = sanitize($_GET['id']);
    $blog = getById('blogs', $id);
    $blogImage = getById('images', $blog['image_id']);
    $user = getById('users', $blog['user_id']);
    $posts = getUsersPosts($blog['user_id']);
} else if(isset($_GET['id']) && isset($_GET['single'])) {
    $id = sanitize($_GET['id']);
    $post = getById('posts', $id);
    $image = getById('images', $post['image_id']);
    $user = getById('users', $post['user_id']);
    $blog = getUsersBlog($user['id'])[0]; 
    $blogImage = getbyId('images', $blog['image_id']);
} 
?>

<main>
    <div class="content post-content clearfix">
        <aside class="sidebar right post-sidebar">

            <section class="blog-info">
                <h2 class="blog-title"><?php echo $user['username'];?></h2>
                <hr>
                <div class="blogger-info">
                    <img src="src/admin/uploads/<?php echo $blogImage['filename']; ?>"
                        alt="<?php echo $blogImage['description']; ?>">
                    <hr>
                    <p class="blog-decription"><?php echo $blog['description']; ?></p>
                </div>
            </section>
            <?php 
            if(isset($_GET['all'])) { ?>
            <section class="recent clearfix ">
                <h2 class="recent-title">Latests posts</h2>
                <?php
                    foreach($posts as $post):
                    $postImage = getById('images', $post['image_id']);
                ?>
                <div class="recent-post clearfix">
                    <img src="src/admin/uploads/<?php echo $postImage['filename']; ?>"
                        alt="<?php echo $postImage['description']; ?>" class="left">
                    <a href="src/blog/includes/content.php?id=<?php echo $post['id']; ?>&single=true"
                        class="recent-link"><?php echo $post['title']; ?></a>
                </div>
                <?php endforeach; ?>
            </section>
            <?php } else {?>
            <div class="manage-buttons">
                <a class="btn btn-success" href="src/blog/includes/content.php?id=<?php echo $blog['id']; ?>&all=true">
                    <i class="fa-solid fa-arrow-left"></i>
                    Back to blog</a>
            </div>
            <?php } ?>
        </aside>

        <?php
        if(isset($_GET['all']) && !$posts) { ?>
        <div class="blog-post-section">
            <div class="post-content">
                <h2>This blog has no posts yet.</h2>
            </div>
        </div>
        <?php }
        if(isset($_GET['all'])) {
        foreach($posts as $post):
            $postimage = getById('images', $post['image_id']);
            $date = strtotime($post['created_at']);
            $newDate = date('m/d/y - G:i', $date);
        ?>

        <div class="blog-post-section">
            <h2 class="post-title"><?php echo $post['title']; ?></h2>
            <p class="text-muted post-p">
                <?php echo $newDate; ?></p>
            <div class="post-content">
                <img src="src/admin/uploads/<?php echo $postimage['filename']; ?>"
                    alt="<?php echo $image['description']; ?>" class="post-image">
                <p class="mb-2 text-muted"><?php echo $postimage['description']; ?></p>
                <hr>
                <p><?php echo $post['text']; ?></p>
            </div>
        </div>
        <?php endforeach; }?>

        <?php
        if(isset($_GET['single'])) {
           $postimage = getById('images', $post['image_id']);
           $date = strtotime($post['created_at']);
           $newDate = date('m/d/y - G:i', $date);
        ?>

        <div class="blog-post-section">
            <h2 class="post-title"><?php echo $post['title']; ?></h2>
            <p class="text-muted post-p">
                <?php echo $newDate; ?></p>
            <div class="post-content">
                <img src="src/admin/uploads/<?php echo $postimage['filename']; ?>"
                    alt="<?php echo $image['description']; ?>" class="post-image">
                <p class="mb-2 text-muted"><?php echo $postimage['description']; ?></p>
                <hr>
                <p><?php echo $post['text']; ?></p>
            </div>
        </div>
        <?php } ?>




    </div>
</main>
<?php include_once('../../includes/footer.php'); ?>