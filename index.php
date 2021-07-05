<?php get_header(); ?>

    <div class="main-page-blog-top">

        <div class="main-page-blog-top-inner">
            <img class="main-page-blog-top-img" src="" alt="">
            <h1 class="main-page-blog-top-head"><br class="index-res-break-h1"></h1>
        </div>

    </div>

    <div class="main-page-blog-inner">

        <?php include("template-parts/blog-posts-lists.php") ?>

        <aside class="main-page-blog-inner-block main-page-blog-inner-right">

            <?php get_sidebar(); ?>

        </aside>

    </div>

<?php get_footer(); ?>