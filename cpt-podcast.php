<?php
/**
 * Podcast Custom Post Type
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

function stoopendaal_register_podcast_cpt() {

    $labels = array(
        'name'               => 'Podcasts',
        'singular_name'      => 'Podcast',
        'menu_name'          => 'Podcasts',
        'add_new'            => 'Nieuwe podcast',
        'add_new_item'       => 'Nieuwe podcast toevoegen',
        'edit_item'          => 'Podcast bewerken',
        'new_item'           => 'Nieuwe podcast',
        'view_item'          => 'Bekijk podcast',
        'search_items'       => 'Zoek podcasts',
        'not_found'          => 'Geen podcasts gevonden',
        'not_found_in_trash' => 'Geen podcasts in prullenbak',
    );

    $args = array(

        'labels'          => $labels,
        'public'          => true,
        'menu_position'   => 6,
        'menu_icon'       => 'dashicons-microphone',

        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
        ),

        'has_archive' => 'afleveringen',

        'rewrite' => array(
            'slug'       => 'afleveringen',
            'with_front' => false,
        ),

        'show_in_rest' => true,

    );

    register_post_type( 'podcast', $args );

}

add_action( 'init', 'stoopendaal_register_podcast_cpt' );