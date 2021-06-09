<?php

global $paged;

if ( ! isset( $paged ) || ! $paged ) {
    $paged = 1;
}

$context = Timber::context();

$context['posts'] = Timber::get_posts( [
    'post_type' => array('ofi','lto','bot','cct','trade-setup-tac'),
    'posts_per_page'	=> 5,
    'order'          => 'DESC',
    'orderby'        => 'meta_value',
    'meta_key'       => 'latest_update_date',
    'meta_type'      => 'DATETIME',
    'paged'          => $paged
] );

Timber::render( 'archive-all.twig', $context );
