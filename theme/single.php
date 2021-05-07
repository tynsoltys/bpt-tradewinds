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
$GLOBALS['pasta'] = false;
// var_dump($GLOBALS['pasta']);

// $ticker = $post->terms( 'symbol' );
// $tickerarray = $ticker->ID;
// // $GLOBALS['underlying_name'] = ;
// $GLOBALS['ticker'] = $post.underlying_name;

$posttype = $post->post_type;
$GLOBALS['ptype'] = $posttype;
// var_dump($GLOBALS['ptype']);
// var_dump($GLOBALS['ptype']);
// var_dump($GLOBALS['ptype']);
// var_dump($GLOBALS['ptype']);
// var_dump($GLOBALS['ticker']);
// var_dump($GLOBALS['underlying_name']);



$permalink = get_permalink( $post->ID );
// var_dump($permalink);
$linked_post = get_field('linked_trade')[0];
$tac_linked = $linked_post->ID;
// var_dump($GLOBALS['tac_linked']);

$legs = get_field('legs');
$GLOBALS['legs'] = $legs;
// var_dump($GLOBALS['legs']);

// DETERMINE POST TYPE
if ( $GLOBALS['ptype'] == "trade-setup-tac" ) {
    // var_dump($GLOBALS['ptype']);
    $linked_post = get_field('linked_trade')[0];
    // var_dump($linked_post);
    $tac_id = $linked_post->ID;
    $tac_legs = get_field('legs', $tac_id);
    $tac_url = get_permalink($tac_id);
    $GLOBALS['linked'] = [];
    $GLOBALS['legs'] = [];
    $GLOBALS['tac_url'] = $tac_url;
    // var_dump($tac_id);
    // var_dump($tac_url);
    function hasPast( $arr ) {
        foreach ($arr as $l ) {
            $context['testvar'] = $l['display'];
            // var_dump($context['testvar']);
            // IS RETURNING CORRECTLY!!
            if ("past" == $l['display']) {
                // TESTING IF THE IF IS WORKING: IT IS
                // var_dump($l['display']);
                //! CLEAR VAR MEMORY IN CASE ITS A WEIRD PHP THING: NOT WORKING
                unset($GLOBALS['pasta']);
                //! REASSIGN VALUE
                $GLOBALS['pasta'] = true;
                // EXIT UPON SATISFACTION (THIS WORKS FINE, TOO)
                // break;
            }
        }
    }
    hasPast( $GLOBALS['legs'] );
    $context['haspast'] = $GLOBALS['pasta'];
    // var_dump($GLOBALS['pasta']);
    // var_dump($GLOBALS['legs']);
} else {
    // var_dump($GLOBALS['ptype']);
    // var_dump($GLOBALS['ttype']);
    if ( $GLOBALS['ttype'] == "trade-type-bot" ) {
        // no legs no worries


    } else {
        // var_dump($GLOBALS['ttype']);
        // var_dump( $GLOBALS['legs'] );
        function hasPast( $arr ) {
            // var_dump($GLOBALS['legs']);
            // var_dump($GLOBALS['ttype']);
            // var_dump($GLOBALS['ptype']);
            // var_dump($GLOBALS['pasta']);
            foreach ($arr as $l ) {
                $context['testvar'] = $l['display'];
                // var_dump($context['testvar']);
                // IS RETURNING CORRECTLY!!
                if ("past" == $l['display']) {
                    // TESTING IF THE IF IS WORKING: IT IS
                    // var_dump($l['display']);
                    // var_dump($context['haspast']);
                    //! CLEAR VAR MEMORY IN CASE ITS A WEIRD PHP THING: NOT WORKING
                    unset($GLOBALS['pasta']);
                    //! REASSIGN VALUE
                    $context['haspast'] = true;
                    $GLOBALS['pasta'] = true;
                    // EXIT UPON SATISFACTION (THIS WORKS FINE, TOO)
                    // break;
                }
            }
        }
        if ( $GLOBALS['legs'] ) {

            if ( count($GLOBALS['legs']) > 0 ) {
                hasPast( $GLOBALS['legs'] );
                $context['haspast'] = $GLOBALS['pasta'];
            } else {
                $context['haspast'] = false;
            }
        } else {

        }


    }

}

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
