<div class="carousel-container">
    <div class="new-posts-carousel"></div>
    <h1 class="carousel-title">Newest posts</h1>
    <i class="fas fa-chevron-left prev"></i>
    <i class="fas fa-chevron-right next"></i>
    <div class="new-posts-container">
        <?php
        $posts = getAllPosts();
        if(!$posts) {
            echo "No posts found";
        }
        foreach($posts as $post):
         $image = getById('images', $post['image_id']);
         $user = getById('users', $post['user_id']);
         $date = strtotime($post['created_at']);
         $newDate = date('m/d/y - G:i', $date);
        ?>
        <div class="new-post">
            <img src="src/admin/uploads/<?php echo $image['filename']; ?>" alt="<?php echo $image['description']; ?>"
                class="carousel-img">
            <div class="post-info">
                <h4><a href="#"><?php echo $post['title']; ?></a></h4>
                <i class="far fa-user"> <?php echo $user['username']; ?></i> &nbsp;
                <i class="far fa-calendar"> <?php echo $newDate; ?></i>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>