<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title()?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <?php wp_head(); ?>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</head>

<body>

<header class="main-header">

    <div class="header-inner">

        <div class="main-header-logo">
            <a href="/">
                <img src="/wp-content/uploads/2021/01/webvision-logo-02.svg" alt="logo web-zone" title="logo web-zone">
            </a>
        </div>

        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'main-menu',
                'container_class' => 'header-main-menu'
            )
        );
        ?>

        <?php echo do_shortcode('[aws_search_form]'); ?>

        <div class="header-right-options">

            <div onclick="searchClick()" class="main-header-search">
                <img src="<?php echo get_template_directory_uri(); ?>/template-parts/icons/search.svg" alt="search-icon" />
                <span class="s-bread s-top"></span>
                <span class="s-bread s-bot"></span>
            </div>

            <div onclick="sandiwchClick()" class="sandwich">
                <span class="bread top"></span>
                <span class="bread bot"></span>
            </div>

        </div>



    </div>

</header>





