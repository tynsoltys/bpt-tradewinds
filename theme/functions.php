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


// CREATING ANNUAL ARCHIVES FOR EACH POST TYPE

$yearly_archive = wp_get_archives(array( 'type' => 'yearly', 'post_type' => 'trade-setups', 'echo' => '0') );
$blog_url = get_bloginfo('url');
echo str_replace(($blog_url . '/date'), ($blog_url . '<your post type slug>'),$yearly_archive);



/*
* PURPOSE : If there are zero results (or other parameters) in the archive query, get_post_type() isn't reliable for knowing what the archive's post type is. This function gets the post type from the global $wp_query object instead.
*  PARAMS : n/a
* RETURNS : boolean / string - the slug for the post type fromm $wp_query, or false if that is not found.
*   NOTES :
*/

function jp_get_archive_post_type(){
    $post_type = false;

    global $wp_query;
    if( isset($wp_query->query['post_type']) ){
        $post_type = $wp_query->query['post_type'];
    }

    return $post_type;
}


// TRYING NEW STYLE OF LOOP
function wpa_post_types_front_page( $query ) {
    if ( $query->is_front_page() && $query->is_main_query() ) {
        $query->set( 'post_type', array(
            'bot',
            'lto',
            'ofi',
            'trade-setup-tac'
        ) );
    }
}
add_action( 'pre_get_posts', 'wpa_post_types_front_page' );
