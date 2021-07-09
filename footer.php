
<footer class="footer">
    <div class="footer-inner">

        <div class="woo-footer">

            <section class="product-footer">
                <h1>Najpopulárnejšie produkty</h1>
                <?php echo do_shortcode("[products limit='5' columns='5' orderby='popularity' class='' ]"); ?>
            </section>

            <section class="product-footer">
                <h1>Kategórie produktov</h1>
                <?php echo do_shortcode("[product_categories number='0' parent='0']"); ?>
            </section>
        </div>  

        <div class="blog-footer">
            <section class="block categories">
                <h1>Kategórie článkov</h1>
                <ul><?php wp_list_cats('sort_column=namonthly'); ?></ul>
            </section>
            <section class="block posts">
                <h1>Články</h1>
                <ul>
                    <?php
                        // Define our WP Query Parameters
                        $the_query = new WP_Query( 'posts_per_page=8' );
                        
                        // Start our WP Query
                        while ($the_query -> have_posts()) : $the_query -> the_post(); 
                            // Display the Post Title with Hyperlink 
                            ?>

                            <div href="<?php the_permalink() ?>" class="article-leftmenu-block-post">
                                <li><a href="<?php the_permalink() ?>"><div class="img-wrap"><?php echo get_the_post_thumbnail(); ?></div><span class="title"><?php the_title(); ?></span></a></li>
                            </div> 

                        <?php
                            // Repeat the process and reset once it hits the limit
                        endwhile;
                        wp_reset_postdata();
                    ?> 
                </ul>
            </section>
        </div>

    </div>   
</footer>
<?php wp_footer();?>

<script>

    let scrollPosition = window.scrollY;

    let headerLogoBlog = document.getElementsByClassName('blog-header-logo')[0];
    let headerInnerBlog = document.getElementsByClassName('blog-header-inner')[0];
    let Sandwich = document.querySelector(".sandwich");

    let MainHeader = document.getElementsByClassName('main-header')[0];

    function sandiwchClick() {

        MainHeader.classList.toggle('main-header-open');

    }

    function searchClick() {

        MainHeader.classList.toggle('main-header-search');

    }

    var slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
    }


</script>

</body>

</html>


