<?php

/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

use Timber\Post;
use Timber\Timber;



$context = Timber::context();
// $context['testvar'] = var_dump($l['display']);

$post = new Post();

$context['trade'] = $post;

// Post Type Variables
$posttype = $post->post_type;
$GLOBALS['ptype'] = $posttype;


// Linked Post Variables (for TAC)
// $permalink = get_permalink( $post->ID );
// $linked_post = get_field('linked_trade')[0];
// $tac_linked = $linked_post->ID;



// var_dump($GLOBALS['ptype']);
$linked_post = get_field('linked_trade')[0];
$tac_id = $linked_post->ID;
$tac_legs = get_field('legs', $tac_id);
$tac_url = get_permalink($tac_id);
$GLOBALS['tac_url'] = $tac_url;
$context['tac_url'] = $GLOBALS['tac_url'];

$templates = [
    'posts/single-' . $post->ID . '.twig',
    'posts/single-' . $post->slug . '.twig',
    'posts/single-' . $post->post_type . '.twig',
    'posts/single.twig',
];

if ( post_password_required() ) {
    Timber::render( 'password-form.twig', $context );
} else {
    Timber::render( $templates, $context );
}
