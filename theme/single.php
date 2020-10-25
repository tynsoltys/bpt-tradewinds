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
    'singles/single-' . $post->ID . '.twig',
    'singles/single-' . $post->slug . '.twig',
    'singles/single-' . $post->post_type . '.twig',
    'singles/single.twig',
];

if ( post_password_required() ) {
    Timber::render( 'password-form.twig', $context );
} else {
    Timber::render( $templates, $context );
}
