<?php include_once('../../../functions.php'); ?>
<?php include_once('../../db/db_queries.php'); ?>

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
            <img src="src/admin/uploads/<?php echo $image['filename'];?>" alt="A blog header image"
                class="blog-card-img left">
            <div class="blog-card-content">
                <h2 class="blog-card-title"><?php echo $blog['title']; ?></h2>
                <p class="blog-card-description"><?php echo $blog['description']; ?></p>
                <i class="far fa-user"> <?php echo $user['username']; ?></i>
                <div>
                    <a href="#" class="btn btn-outline-secondary blog-card-btn" role="button" aria-pressed="true">Go to
                        blog</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <!--  <div class="blog-card">
            <img src="src/images/blogs/blog_header.png"
                alt="A blog header image that says Explore the world and with a camera" class="blog-card-img left">
            <div class="blog-card-content">
                <h2 class="blog-card-title"><a href="#"></a>Lorem ipsum dolor sit amet</h2>
                <p class="blog-card-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem delectus
                    nisi
                    aspernatur laudantium
                    inventore voluptas eius accusantium, ea cum! Odio.</p>
                <i class="far fa-user"> Bloggers name</i>
                <div>
                    <a href="#" class="btn btn-outline-secondary blog-card-btn" role="button" aria-pressed="true">Go to
                        blog</a>
                </div>
            </div>
        </div>
        <div class="blog-card">
            <img src="src/images/blogs/blog_header.png"
                alt="A blog header image that says Explore the world and with a camera" class="blog-card-img left">
            <div class="blog-card-content">
                <h2 class="blog-card-title"><a href="#"></a>Lorem ipsum dolor sit amet</h2>
                <p class="blog-card-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem delectus
                    nisi
                    aspernatur laudantium
                    inventore voluptas eius accusantium, ea cum! Odio.</p>
                <i class="far fa-user"> Bloggers name</i>
                <div>
                    <a href="#" class="btn btn-outline-secondary blog-card-btn" role="button" aria-pressed="true">Go to
                        blog</a>
                </div>
            </div>
        </div>
        <div class="blog-card">
            <img src="src/images/blogs/blog_header.png"
                alt="A blog header image that says Explore the world and with a camera" class="blog-card-img left">
            <div class="blog-card-content">
                <h2 class="blog-card-title"><a href="#"></a>Lorem ipsum dolor sit amet</h2>
                <p class="blog-card-description">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem delectus
                    nisi
                    aspernatur laudantium
                    inventore voluptas eius accusantium, ea cum! Odio.</p>
                <i class="far fa-user"> Bloggers name</i>
                <div>
                    <a href="src/blog/includes/content.php" class="btn btn-outline-secondary blog-card-btn"
                        role="button" aria-pressed="true">Go to
                        blog</a>
                </div>
            </div>
        </div> -->
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
                <img src="src/images/uploads/unsplash.jpg" alt="An image of rocky mountains in a desert plain">
                <hr>
                <a class="blogger-name" href="">Bloggers name</a>
                <p class="blog-decription">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora iste
                    mollitia quos assumenda quae, temporibus aliquam repellendus fugit eum ipsa harum consectetur
                    quo rem inventore asperiores doloremque dolorum. Aut labore optio assumenda placeat eveniet
                    laudantium ab corporis. Nam quisquam nesciunt soluta velit nisi numquam facilis, ratione fuga
                    explicabo at animi.</p>
            </div>
        </section>
    </aside>
</div>