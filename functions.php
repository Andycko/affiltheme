<?php

//Menus


//remove woo css
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function theme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'theme_add_woocommerce_support' );

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

    wp_register_style('footer', get_template_directory_uri(). '/styles/footer.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('footer');

    wp_register_style('coupones', get_template_directory_uri(). '/styles/coupones-wide.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('coupones'); 

	wp_register_style('tag', get_template_directory_uri(). '/styles/tag.css', array(), rand(111,9999), 'all');
    wp_enqueue_style('tag');

	
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/styles/colors.css', array('parent-style') );
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/styles/colors.css', array(), );

}
add_action('wp_enqueue_scripts', 'load_css');

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
 
function register_menus() { 
    register_nav_menus( array(
        'main-menu' => 'Main menu', 
        'top-cats-menu' => 'top-cats-menu',
    ) ); 
} 

//woo & timber compatibility stuff within tease-product.twig 
function timber_set_product( $post ) {
    global $product;

    if ( is_woocommerce() ) {
        $product = wc_get_product( $post->ID );
    }
}


/**
 * This ensures that Timber is loaded and available as a PHP class.
 * If not, it gives an error message to help direct developers on where to activate
 */
if ( ! class_exists( 'Timber' ) ) {

	add_action(
		'admin_notices',
		function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		}
	);

	add_filter(
		'template_include',
		function( $template ) {
			return get_stylesheet_directory() . '/static/no-timber.html';
		}
	);
	return;
}

/**
 * Sets the directories (inside your theme) to find .twig files
 */
Timber::$dirname = array( 'templates', 'views' );

/**
 * By default, Timber does NOT autoescape values. Want to enable Twig's autoescape?
 * No prob! Just set this value to true
 */
Timber::$autoescape = false;


/**
 * We're going to configure our theme inside of a subclass of Timber\Site
 * You can move this to its own file and include here via php's include("MySite.php")
 */
class AffilTheme extends Timber\Site {
	/** Add timber support. */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
		add_filter( 'timber/context', array( $this, 'add_to_context' ) );
		//add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		parent::__construct();
	}

    

	/** This is where you can register custom post types. */
	public function register_post_types() {

	}
	/** This is where you can register custom taxonomies. */
	public function register_taxonomies() {

	}

	/** This is where you add some context
	 *
	 * @param string $context context['this'] Being the Twig's {{ this }}.
	 */
	public function add_to_context( $context ) {
		$context['menuMain']  = new Timber\Menu('main-menu');
		$context['topCatsMenu']  = new Timber\Menu('top-cats-menu');
		$context['archives'] = new TimberArchives( $args );
		$context['site']  = $this;
		$context['featured'] = new Timber\PostQuery(array(
            'post_type' => 'post',
            'posts_per_page' => 8,
        ));
		$context['threeLatestPosts'] = new Timber\PostQuery(array(
            'post_type' => 'post',
            'posts_per_page' => 3, 
        ));
		return $context;
	}

	public function theme_supports() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);

		add_theme_support( 'menus' );
	}
}

new AffilTheme();

add_action('woocommerce_before_shop_loop', 'display_sub_subcategories', 10 );
function display_sub_subcategories() {
    $obj      = get_queried_object();
    $taxonomy = 'product_cat';

    if ( is_a($obj, 'WP_Term') && $taxonomy === $obj->taxonomy && 0 != $obj->parent ) {
        // Get sub-subcategories of the current subcategory
        $terms = get_terms([
            'taxonomy'    => $taxonomy,
            'hide_empty'  => true,
            'parent'      => $obj->term_id
        ]);

        if ( ! empty($terms) ) :

        $output = '<ul class="subcategories-list">';

        // Loop through product subcategories WP_Term Objects
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, $taxonomy );

            $output .= '<li class="'. $term->slug .'"><a href="'. $term_link .'">'. $term->name .'</a></li>';
        }

        echo $output . '</ul>';
        endif;
    }
} 