<?php

/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

$templates = [ 'sidebar.twig' ];

Timber::render( $templates, Timber::context() );
