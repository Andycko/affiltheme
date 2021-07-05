<?php

//Menus
register_nav_menus(
    array(
        'main-menu' => 'main-menu',
        'top-cats-menu' => 'top-cats-menu',
    )
);

//remove woo css
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

//Add custom css
function load_css()
{

    wp_register_style('front-page', get_template_directory_uri(). '/styles/front-page.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('front-page');

    wp_register_style('header', get_template_directory_uri(). '/styles/header.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('header');

    wp_register_style('index', get_template_directory_uri(). '/styles/index.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('index');

    wp_register_style('pagination', get_template_directory_uri(). '/styles/woo/pagination.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('pagination');

    wp_register_style('category-page', get_template_directory_uri(). '/styles/woo/category-page.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('category-page');

    wp_register_style('product-page', get_template_directory_uri(). '/styles/woo/product-page.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('product-page');

    wp_register_style('singular', get_template_directory_uri(). '/styles/singular.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('singular');

    wp_register_style('sidebar', get_template_directory_uri(). '/styles/sidebar.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('sidebar');

    wp_register_style('coupones', get_template_directory_uri(). '/styles/coupones-wide.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('coupones');


}
add_action('wp_enqueue_scripts', 'load_css');

function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );

//lightbox

add_action( 'after_setup_theme', 'themename_setup' );
function themename_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
}

//change img size

add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
    return array(
        'width' => 600,
        'height' => 600,
        'crop' => 0,
    );
} );

//estimated reading time
function reading_time() {
    $content = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);
    if ($readingtime == 1) {
        $timer = " min";
    } else {
        $timer = " min";
    }
    $totalreadingtime = $readingtime . $timer;
    return $totalreadingtime;
}