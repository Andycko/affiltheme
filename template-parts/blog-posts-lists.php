<main class="main-page-blog-inner-block main-page-blog-inner-left">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink() ?>" class="page-blog-post-block">

            <?php if( has_post_thumbnail() ): ?>
                <div class="page-blog-post-block-img">
                    <?php echo get_the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>

            <div class="page-blog-post-block-text">
                <h2 class="page-blog-post-block-text-head"><?php the_title(); ?></h2>
                <span class="page-blog-post-block-text-info">Publikované <?php the_time('F jS, Y') ?>  -  <?php echo reading_time(); ?> čítania</span>
                <?php the_excerpt(); ?>
            </div>

        </a>
    <?php endwhile; else: ?>
        <div class="nic-sa-nenaslo-wrapper">
            <p class="nic-sa-nenaslo"><?php _e('Nenašlo sa nič :('); ?></p>
        </div>
    <?php endif; ?>

    <?php get_template_part( 'template-parts/pagination' ); ?>


</main>