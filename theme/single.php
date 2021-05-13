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


// Leg Status Variables
$GLOBALS['pastLegs'] = false;
$GLOBALS['currentLegs'] = false;
$legs = get_field('legs');
$GLOBALS['legs'] = $legs;
// var_dump($GLOBALS['legs']);

// var_dump($GLOBALS['legs']);
// var_dump($GLOBALS['currentLegs']);
// var_dump($GLOBALS['pastLegs']);


    if ( $GLOBALS['ttype'] == "trade-type-bot" ) {
        // no legs no worries


    } else {
        // var_dump($GLOBALS['ttype']);
        // var_dump( $GLOBALS['legs'] );
        function legStatus( $arr ) {
            foreach ($arr as $leg ) {
                if ($leg['display'] == "past") {
                    $GLOBALS['pastLegs'] = true;
                } elseif ($leg['display'] == "current") {
                    $GLOBALS['currentLegs'] = true;
                }
            }
        }


        if ( $GLOBALS['legs'] ) {
            if ( count($GLOBALS['legs']) > 0 ) {
                legStatus( $GLOBALS['legs'] );
                $context['hasPast'] = $GLOBALS['pastLegs'];
                $context['hasCurrent'] = $GLOBALS['currentLegs'];
            } else {
                $context['hasPast'] = false;
                $context['hasCurrent'] = false;
            }
        } else {

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
