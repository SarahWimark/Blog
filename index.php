<?php define('TITLE', 'Welcome page'); ?>
<?php include_once('./src/includes/header.php'); ?>

<main>
    <div class="carousel-container">

        <div class="new-posts-carousel"></div>
        <h1 class="carousel-title">Newest posts</h1>
        <i class="fa fa-chevron-left prev"></i>
        <i class="fa fa-chevron-right next"></i>
        <div class="new-posts-container">
            <div class="new-post">1</div>
            <div class="new-post">2</div>
            <div class="new-post">3</div>
            <div class="new-post">4</div>
            <div class="new-post">5</div>
        </div>

    </div>
</main>
<?php include_once('./src/includes/footer.php'); ?>