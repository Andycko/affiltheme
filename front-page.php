<?php 

$context          = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['foo']   = 'bar';
$templates        = array( 'front-page.twig' );
if ( is_front_page() ) { 
	array_unshift( $templates, 'front-page.twig', 'home.twig' );
} 
Timber::render( $templates, $context );  