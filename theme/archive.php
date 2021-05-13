<?php

/**
 * The template for displaying archive pages
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

use Timber\Post;
use Timber\PostQuery;
use Timber\URLHelper;
use Timber\Timber;


$templates = [ 'archive.twig', 'index.twig' ];

$context = Timber::context();

$context['title'] = __( 'Archive', 'jackpine' );

$titlePartial = __( 'Archive for ', 'jackpine' );

// Get post types
$context['ptype'] = jp_get_archive_post_type();

// Get year
$context['year'] = get_query_var('year', 1);

// Get trade_status
$context['trade_status'] = get_query_var('trade_status');

//Get current URL
$context['current_url'] = home_url( $wp->request );


if ( is_day() ) {
    $context['title'] = $titlePartial . get_the_date( 'F j, Y' );

}

if ( is_month() ) {
    $context['title'] = $titlePartial . get_the_date( 'F, Y' );

}

if ( is_year() ) {
    $context['title'] = $titlePartial . get_the_date( 'Y' );

}

if ( is_tag() ) {
    $context['title'] = single_tag_title( '', false );


}

if ( is_category() ) {
    $context['title'] = single_cat_title( '', false );


}

if ( is_tax() ) {
    $context['title'] = single_term_title( '', false );

}

if ( is_post_type_archive() ) {
    $context['title'] = post_type_archive_title( '', false );
    $context['thelink'] = get_post_type_archive_link( '', false );

    $context['years'] = wp_get_archives( [
        'post_type'      => jp_get_archive_post_type(),
        'type'            => 'yearly',
        'show_post_count' => 0,
        'format'          => 'html',
        'echo'               => 0,
    ] );


}

$context['pagination'] = Timber::get_pagination($posts);



// TESTING MERGING
$orderbyupdate = array(
    'order'          => 'DESC',
    'orderby'        => 'meta_value',
    'meta_key'       => 'latest_update_date',
    'meta_type'      => 'DATETIME',
);



global $paged;
if (!isset($paged) || !$paged){
    $paged = 5;
}

Timber::render( $templates, $context );
