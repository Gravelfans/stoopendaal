<?php
/**
 * Register Route Taxonomies
 *
 * @package Stoopendaal
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Route Taxonomies
 */
function stoopendaal_register_route_taxonomies() {

	$taxonomies = array(

		'provincie' => 'Provincies',

		'moeilijkheid' => 'Moeilijkheid',

		'ondergrond' => 'Ondergrond',

		'route_type' => 'Route Type',

	);

	foreach ( $taxonomies as $slug => $label ) {

		register_taxonomy(

			$slug,

			'route',

			array(

				'label' => $label,

				'public' => true,

				'hierarchical' => true,

				'show_admin_column' => true,

				'show_in_rest' => true,

				'rewrite' => array(
					'slug' => $slug,
				),

			)

		);

	}

}

add_action( 'init', 'stoopendaal_register_route_taxonomies' );