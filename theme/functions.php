<?php

/**
 * Lodgepole
 *
 * Based on the Timber starter theme.
 * Huge thanks to the folks who made the tools that Lodgepole is built on.
 *
 * @package WordPress
 * @subpackage Lodgepole
 * @since Lodgepole 0.1.0
 */

require_once dirname( __DIR__ ) . '/vendor/autoload.php';

use Timber\Site;
use Timber\Timber;
use Twig\Environment;
use WPackio\Enqueue;

class LodgepoleSite extends Site {
    public Timber $timber;
    public Enqueue $enqueue;

    public function __construct() {
        $this->timber = new Timber();

        Timber::$dirname = [ '../templates' ];

        $this->enqueue = new Enqueue(
            'lodgepole',
            '../dist',
            '0.1.0',
            'theme',
            false
        );

        add_action( 'after_setup_theme', [ $this, 'theme_support' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
        add_filter( 'timber/context', [ $this, 'custom_context' ] );
        add_filter( 'timber/twig', [ $this, 'custom_twig' ] );
        add_action( 'init', [ $this, 'custom_post_types' ] );
        add_action( 'init', [ $this, 'custom_taxonomies' ] );

        parent::__construct();
    }

    /**
     * Enqueues WPackIO scripts.
     *
     * @return void
     */
    public function enqueue_scripts() {
        $this->enqueue->enqueue( 'app', 'main', [] );
    }

    /**
     * Registers supported features.
     *
     * @return void
     */
    public function theme_support() {
        // Enables RSS feeds for posts and comments
        add_theme_support( 'automatic-feed-links' );

        // Lets WordPress provide the document title
        add_theme_support( 'title-tag' );

        // Enables featured images for posts
        add_theme_support( 'post-thumbnails' );

        // Enables HTML5 markup for certain elements
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            ]
        );
    }

    /**
     * Registers global context variables.
     *
     * @param  array  $context  Timber global context
     *
     * @return array
     */
    public function custom_context( array $context ) {
        $context['site'] = $this;

        return $context;
    }

    /**
     * Registers Twig extensions.
     *
     * @param  Environment  $twig  Twig environment
     *
     * @return Environment
     */
    public function custom_twig( Environment $twig ) {
        return $twig;
    }

    /**
     * Registers custom post types.
     *
     * @return void
     */
    public function custom_post_types() {
        //
    }


    /**
     * Registers custom taxonomies.
     *
     * @return void
     */
    public function custom_taxonomies() {
        //
    }
}

new LodgepoleSite();
