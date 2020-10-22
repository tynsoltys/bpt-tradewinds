<?php

/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Lodgepole
 * @since Lodgepole 0.1.0
 */

$post = Timber::get_post();

$templates = [
    'singles/single-' . $post->slug . '.twig',
    'singles/single-' . $post->post_type . '.twig',
    'singles/single.twig'
];

Timber::render( $templates, Timber::context() );
