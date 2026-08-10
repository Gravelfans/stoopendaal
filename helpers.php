<?php
/**
 * Helpers
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

/**
 * SVG Icon Helper
 *
 * @param string $icon Naam van het icoon zonder .svg.
 */
if ( ! function_exists( 'stoopendaal_icon' ) ) {

	function stoopendaal_icon( $icon ) {

		$file = get_template_directory() . '/assets/icons/' . $icon . '.svg';

		if ( file_exists( $file ) ) {
			include $file;
		}

	}

}