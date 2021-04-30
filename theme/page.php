<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

use Timber\Post;
use Timber\Timber;

$context = Timber::context();

//ALL TRADES
$trades = array(
    'post_type' => array('trade-setup','trade-setup-tac'),
    'posts_per_page'	=> 20,
    'order'          => 'DESC',
    'orderby'        => 'meta_value',
    'meta_key'       => 'latest_update_date',
    'meta_type'      => 'DATETIME',
);

$opentrades = array(
    'post_type' => array('trade-setup','trade-setup-tac'),
    'posts_per_page'	=> -1,
    'order'          => 'DESC',
    'orderby'        => 'meta_value',
    'meta_key'       => 'latest_update_date',
    'meta_type'      => 'DATETIME',
);

//TAC
$tac = array(
    'post_type' => 'trade-setup-tac',
    'posts_per_page'	=> -1,
    'order'          => 'DESC',
    'orderby'        => 'meta_value',
    'meta_key'       => 'latest_update_date',
    'meta_type'      => 'DATETIME',
);

$context['trades'] = Timber::get_posts($trades);
$context['tac'] = Timber::get_posts($tac);

$post = new Post();

$templates = [
    'pages/page-' . $post->ID . '.twig',
    'pages/page-' . $post->slug . '.twig',
    'pages/page-' . $post->post_type . '.twig',
    'pages/page.twig',
];

if ( post_password_required() ) {
    Timber::render( 'password-form.twig', $context );
} else {
    Timber::render( $templates, $context );
}
