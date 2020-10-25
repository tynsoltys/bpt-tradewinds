<?php

/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

$context = Timber::context();

$post = Timber::get_post();

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
