<?php get_header(); ?>

<div class="progress" id="progress"></div>

<div class="article-wrapper">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="article-header">

        <?php if( has_post_thumbnail() ): ?>
            <div class="article-thumbnail">
                <?php echo get_the_post_thumbnail(); ?>
            </div>
        <?php endif; ?>

        <div class="article-header-head-wrap">
            <h1 class="article-header-head"><?php the_title(); ?></h1>
            <div class="article-date-wrap">
                <span class="page-blog-post-block-text-info">Publikovan√© <?php the_time('F jS, Y') ?></span>
                <span class="date-separator">-</span>
                <span class="page-blog-post-block-text-info">Aktualizovan√© <?php the_modified_date('F jS, Y') ?></span>
            </div>
        </div>

    </div>

    <div class="article-inner-wrap">

        <div class="article-left">

            <div class="article-leftmenu-wrap">
                <div class="article-leftmenu-inner">

                    <div class="article-leftmenu-block">

                    <span class="article-leftmenu-block-head">
                       <i class="fas fa-fire-alt"></i> Naposledy pridan√©
                   </span>

                        <?php
                        // Define our WP Query Parameters
                        $the_query = new WP_Query( 'posts_per_page=5' ); ?>


                        <?php
                        // Start our WP Query
                        while ($the_query -> have_posts()) : $the_query -> the_post();
                            // Display the Post Title with Hyperlink
                            ?>

                            <div href="<?php the_permalink() ?>" class="article-leftmenu-block-post">
                                <?php echo get_the_post_thumbnail(); ?>
                                <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>

                                <a class="link-abs" href="<?php the_permalink() ?>"></a>
                            </div>

                        <?php
                            // Repeat the process and reset once it hits the limit
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <div class="article-leftmenu-block">

            <span class="article-leftmenu-block-head">
                <i class="fas fa-th-large"></i> Kateg√≥rie ńćl√°nkov
           </span>

                        <?php wp_list_cats('sort_column=namonthly'); ?>

                    </div>

                </div>
            </div>

        </div>

        <article class="article">

            <div class="article-content">

                <?php the_content(); ?>

                <?php $tags = get_tags(); ?> 
                <section class="tags-wrap"> 

                    <h1 class="tags-heading font-main-c"><i class="fas fa-hashtag"></i>Znańćky</h1>

                    <div class="tags">
                        <?php foreach ( $tags as $tag ) { ?>
                            <a href="<?php echo get_tag_link( $tag->term_id ); ?> " rel="tag"><?php echo $tag->name; ?></a>
                        <?php } ?> 
                    </div>
                </section>  

            </div>

            <?php endwhile; else : ?>
                404 not found
            <?php endif; ?>

        </article>

    </div>

</div>

<script>

    let prog = document.getElementById('progress');

    let body = document.body,
        html = document.documentElement;

    let height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);

    const setProgress = () => {
        let scrollFromTop = (document.documentElement.scrollTop || body.scrollTop) + html.clientHeight;
        let width = scrollFromTop / height * 100 + '%';

        console.log('scroll', html.clientHeight, body.scrollTop);

        prog.style.width = width;
    }

    window.addEventListener('scroll', setProgress);

    setProgress();


</script>

<?php get_footer(); ?>





