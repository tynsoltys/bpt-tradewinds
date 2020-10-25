<?php

/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

$context = Timber::context();

$templates = [ 'search.twig', 'archive.twig', 'index.twig' ];

$context['title'] = sprintf( __( 'Search results for "%s"', 'jackpine' ), get_search_query() );

Timber::render( $templates, $context );
