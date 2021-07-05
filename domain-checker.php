<?php get_header(); ?>
<?php /* Template Name: DomainChecker */ ?>

<div class="domain-checker-top-inner">

    <div class="domain-chcker-wrap-top">
        <div class="domain-checker-top-inner-head">

            <img class="domain-checker-img" src="/wp-content/uploads/2021/02/VDN-404-Flat-Illustration-v3.3.svg" alt="clovek ktory hlada dostupnu domenu">

            <h1 class="domain-checker-head"><?php the_title(); ?></h1>

        </div>

        <div class="domain-checker-tool-wrap">

            <form class="domain-checker-tool-form"  method="GET">
                <span class="www"><span>www.</span></span>
                <input id="searchBar" class="searchbar" type="text" name="domain" placeholder="Zadajte meno domény a koncovku..." value="<?php if(isset($_GET['domain'])){ echo $_GET['domain']; } ?>">
                <button type="submit" id="skontrolovat-domenu" class="btn-search"><i class="fa fa-search"></i>Overiť</button>
            </form>

        </div>

        <div class="domain-checker-message-wrap">

            <?php
            error_reporting(0);
            if(isset($_GET['domain'])){
                $domain = $_GET['domain'];
                if ( gethostbyname($domain) != $domain ) {
                    echo "<span class='output-message fail'>Ľutujeme doména 👉 $domain je už obsadená.😥 Neváhaj a skúšaj dalej!</span>";

                }
                else {
                    echo "<span class='output-message success'>🎉 Super, doména je k dispozícií !</span>";
                }

            }


            ?>





        </div>

        <?php if( have_rows('registrator') ): ?>
            <div class="domain-registrars-wrap">
                <?php while( have_rows('registrator') ): the_row();
                    $image = get_sub_field('logo');
                    $link = get_sub_field('link');
                        if( $link ):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <div class="domain-registrars">
                        <div class="domain-registrars-logo-wrap">
                            <img class="domain-registrars-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        </div>
                        <a class="domain-registrars-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>
                        <a class="domain-registrars-link-abs" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"></a>
                    </div>
                        <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <div class="article-wrapper">

            <article class="article">

                <div class="article-content">
                    <?php the_content(); ?>
                </div>

            </article>

        </div>


    </div>

</div>


<?php get_footer(); ?>
