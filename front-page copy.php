<?php get_header(); ?>

<main class="front-page-wrap">

    <div class="front-page-inner">

        <h1 class="fp-heading"><?php the_title(); ?></h1>

        <div class="top-slider"></div>

        <div class="top-kategorie">
            <h2 class="tk-heading">Top kategórie</h2>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top-cats-menu',
                    'container_class' => 'top-kategorie'
                )
            );
            ?>
        </div>

        
        <div class="three-cat-block-wrap">

            <div class="three-cat-block">
                <a class="link" href="#"></a>
                <div class="three-cat-block-text">
                    <span class="small-text">Small Text</span>
                    <span class="large-text">Large Text</span>
                </div>
                <img src="/wp-content/uploads/2021/02/YE156-90X-002_5.jpg" alt="" />
            </div>

            <div class="three-cat-block">
                <a class="link" href="#"></a>
                <div class="three-cat-block-text">
                    <span class="small-text">Small Text</span>
                    <span class="large-text">Large Text</span>
                </div>
                <img src="/wp-content/uploads/2021/02/YE156-90X-002_5.jpg" alt="" />
            </div>

            <div class="three-cat-block">
                <a class="link" href="#"></a>
                <div class="three-cat-block-text">
                    <span class="small-text">Small Text</span>
                    <span class="large-text">Large Text</span>
                </div>
                <img src="/wp-content/uploads/2021/02/YE156-90X-002_5.jpg" alt="" />
            </div>

        </div>

        <div class="two-cat-block-wrap">

            <div class="two-cat-block">
                <a class="link" href="#"></a>
                <div class="two-cat-block-text">
                    <span class="small-text">Small Text</span>
                    <span class="large-text">Large Text</span>
                </div>
                <img src="/wp-content/uploads/2021/02/YE156-90X-002_5.jpg" alt="" />
            </div>

            <div class="two-cat-block">
                <a class="link" href="#"></a>
                <div class="two-cat-block-text">
                    <span class="small-text">Small Text</span>
                    <span class="large-text">Large Text</span>
                </div>
                <img src="/wp-content/uploads/2021/02/YE156-90X-002_5.jpg" alt="" />
            </div>

        </div>

        <div class="big-cat-block">
            <div class="big-cat-block-left" style="background: #dcdcdc">
                <div class="big-cat-block-left-text">
                    <span class="small-text">Small Text</span>
                    <span class="large-text">Large Text</span>
                    <a class="button" href="#" > Burron</a>
                </div>
            </div>
            <div class="big-cat-block-right">
                <img src="/wp-content/uploads/2021/02/YE156-90X-002_5.jpg" alt="" />
            </div>
        </div>

        <div class="basic-fp-block">
            <h2 class="fp-subheading">Náš blog</h2> 
        </div>        

        <?php
            $postArr = array(111424, 108826, 109095);
            //shuffle($postArr);

            foreach ($postArr as $postIDrand) {
                echo 
                    '
                    <a class="blog-block" href="'.get_permalink($postIDrand).'">
                    <div class="img-wrap">'.get_the_post_thumbnail($postIDrand).'</div>
                        <h2>'.get_the_title($postIDrand).'</h2>
                        <button>Čítaj <i class="fas fa-arrow-right"></i></button>
                    </a>
                    '
                ;
            }
            ?>

    </div>
</main>

<?php get_footer(); ?> 