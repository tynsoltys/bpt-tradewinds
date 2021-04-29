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


$context['trade'] = $post;


// $legs = get_field('legs');

// function leg_sort( $legs ) {
//     switch ($a) {
//         case "current":
//         array_push( $context['current'], $a );
//           echo "current";
//           break;
//         case "past":
//             array_push( $context['past'], $a );
//           echo "past"
//           break;
//         case "alternate":
//             array_push( $context['alternate'], $a );
//           echo "alternate"
//           break;
//         default:
//           echo '';
//       }
//       return
//   }



// $context['past'] = $post;
// $context['alternate'] = $post;

$post = new Post();



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
