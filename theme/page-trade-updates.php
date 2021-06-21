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
use Timber\URLHelper;
use Timber\Timber;


global $page, $paged;


$page = get_query_var('page');
if ( empty($page) ) {
    $page = 1;
}

$paged = $page;

$context = Timber::context();

//ALL TRADES
$alltrades = array(
    'post_type' => array('ofi','lto','bot','cct','trade-setup-tac'),
    'posts_per_page'	=> -1,
    'order'          => 'DESC',
    'orderby'        => 'meta_value',
    'meta_key'       => 'latest_update_date',
    'meta_type'      => 'DATETIME',
    'date_query' => array(
        array(
        'after' => '-7 days',
        'column' => 'latest_update_date',
        ),
        ),
    'paged'          =>  $paged,
);

//TAC
$tac = array(
    'post_type' => 'trade-setup-tac',

    'posts_per_page'	=> -1,
    'order'          => 'DESC',
    'orderby'        => 'meta_value',
    'meta_key'       => 'latest_update_date',
    'meta_type'      => 'DATETIME',
    'paged'          =>  $paged,

);

$context['posts'] = Timber::get_posts($alltrades);




// var_dump($context['trades']);
$context['tac'] = Timber::get_posts($tac);

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
