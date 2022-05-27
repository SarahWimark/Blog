<div class="content clearfix">
    <div class="all-bloggers-section">
        <h2 class="all-bloggers-section-title">All blogs</h2>
        <?php
             $blogs = getAllBlogs();
             foreach($blogs as $blog):
             $image = getById('images', $blog['image_id']);
             $user = getById('users', $blog['user_id']);
             ?>
        <div class="blog-card">
            <img src="src/admin/uploads/<?php echo $image['filename'];?>" alt="<?php echo $image['filename'];?>"
                class="blog-card-img left">
            <div class="blog-card-content">
                <h2 class="blog-card-title"><?php echo $blog['title']; ?></h2>
                <p class="blog-card-description"><?php echo $blog['description']; ?></p>
                <i class="far fa-user"> <?php echo $user['username']; ?></i>
                <div>
                    <a href="src/blog/includes/content.php?id=<?php echo $blogs[0]['id']; ?>&blog=true"
                        class="btn btn-outline-secondary blog-card-btn" role="button" aria-pressed="true">Go to
                        blog <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <aside class="sidebar left">
        <section class="search">
            <h2 class="search-title">Search blogs</h2>
            <form action="">
                <input type="search" name="searchterm" class="search-input" placeholder="Search...">
            </form>
        </section>
        <section class="blog-info">
            <h2 class="blog-title">Newest blogger</h2>
            <hr>
            <div class="blogger-info clearfix">
                <?php  
                $image = getById('images', $blogs[0]['image_id']);
                $user = getById('users', $blogs[0]['user_id']); 
                ?>
                <img src="src/admin/uploads/<?php echo $image['filename'];?>" alt="<?php echo $image['description'];?>">
                <hr>
                <a class="blogger-name"
                    href="src/blog/includes/content.php?id=<?php echo $blogs[0]['id']; ?>&blog=true"><?php echo $user['username']; ?></a>
                <p class="blog-decription"><?php echo $blogs[0]['description'];?></p>
            </div>
        </section>
    </aside>
</div>