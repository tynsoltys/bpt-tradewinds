<?php

/**
 * Jackpine
 *
 * Based on the Timber starter theme.
 * Huge thanks to the folks who made the tools that Jackpine is built on.
 *
 * @package WordPress
 * @subpackage Jackpine
 * @since Jackpine 0.1.0
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

use Jackpine\JackpineSite;

new JackpineSite( 'jackpine', '0.11.0', '../dist', '../assets/templates' );

// GOOGLE FONTS

function google_fonts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );

// MENUS

add_filter( 'timber/context', 'add_to_context' );

function add_to_context( $context ) {

    // Now, in similar fashion, you add a Timber Menu and send it along to the context.
    $context['trade_types_select'] = new \Timber\Menu( 'Trade Types Select' );

    return $context;
}

// SEARCH CAPABILITIES

function trade_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'trade-setup', 'trade-setup-tac' ) );
    }
}
add_action( 'pre_get_posts', 'trade_search_results' );
