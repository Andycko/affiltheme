<?php 

$context          = Timber::context();
$context['posts'] = new Timber\PostQuery();
$context['foo']   = 'bar';
$templates        = array( 'tag.twig' );
Timber::render( $templates, $context );  