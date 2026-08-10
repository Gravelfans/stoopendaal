<?php
/**
 * Register Custom Post Types
 *
 * @package Stoopendaal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Routes Post Type
 */
function stoopendaal_register_routes_post_type() {

	$labels = array(
		'name'                  => __( 'Routes', 'stoopendaal' ),
		'singular_name'         => __( 'Route', 'stoopendaal' ),
		'menu_name'             => __( 'Routes', 'stoopendaal' ),
		'name_admin_bar'        => __( 'Route', 'stoopendaal' ),
		'add_new'               => __( 'Nieuwe Route', 'stoopendaal' ),
		'add_new_item'          => __( 'Nieuwe Route toevoegen', 'stoopendaal' ),
		'edit_item'             => __( 'Route bewerken', 'stoopendaal' ),
		'new_item'              => __( 'Nieuwe Route', 'stoopendaal' ),
		'view_item'             => __( 'Bekijk Route', 'stoopendaal' ),
		'all_items'             => __( 'Alle Routes', 'stoopendaal' ),
		'search_items'          => __( 'Zoek Routes', 'stoopendaal' ),
		'not_found'             => __( 'Geen routes gevonden.', 'stoopendaal' ),
		'not_found_in_trash'    => __( 'Geen routes gevonden in prullenbak.', 'stoopendaal' ),
	);

	$args = array(

		'labels'             => $labels,

		'public'             => true,

		'show_in_rest'       => true,

		'menu_position'      => 5,

		'menu_icon'          => 'dashicons-location-alt',

		'has_archive'        => true,

		'rewrite'            => array(
			'slug' => 'routes',
		),

		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),

	);

	register_post_type( 'route', $args );

}

add_action( 'init', 'stoopendaal_register_routes_post_type' );