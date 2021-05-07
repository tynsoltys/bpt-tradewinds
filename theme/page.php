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
use Timber\PostQuery;
use Timber\URLHelper;
use Timber\Timber;


global $page, $paged;


$page = get_query_var('page');
var_dump($page);
var_dump($page);
var_dump($page);
var_dump($page);
var_dump($page);

if ( empty($page) ) {
    $page = 1;
}

$paged = $page;

$context = Timber::context();

//ALL TRADES
$alltrades = array(
    'post_type' => array('ofi','lto','bot','trade-setup-tac'),
    'posts_per_page'	=> 5,
    'order'          => 'DESC',
    'orderby'        => 'meta_value',
    'meta_key'       => 'latest_update_date',
    'meta_type'      => 'DATETIME',
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
    // 'date_query' => array(
    //     array(
    //       'after'   => '-1 month',
    //     ),
    //   ),
);

$context['posts'] = Timber\PostQuery($alltrades);




// var_dump($context['trades']);
$context['tac'] = Timber::get_posts($tac);
$context['pagination'] = Timber::get_pagination($posts);
var_dump($context['pagination']);


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
