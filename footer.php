
<footer class="footer">


    <?php wp_footer();?>
</footer>

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


