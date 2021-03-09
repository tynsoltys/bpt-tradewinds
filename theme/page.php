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

$trades = array('post_type' => 'trade-setup');
$bots = array('post_type' => 'trade-bot');

$context['trades'] = Timber::get_posts($trades);
$context['bots'] = Timber::get_posts($bots);

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
