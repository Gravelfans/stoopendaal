<?php
/**
 * Live Statistics
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

/**
 * Totale afstand
 */
function stoopendaal_total_distance() {

    $posts = get_posts( array(
        'post_type'      => 'route',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'fields'         => 'ids',
    ) );

    $total = 0;

    foreach ( $posts as $post_id ) {

        $distance = get_field( 'distance', $post_id );

        if ( is_numeric( $distance ) ) {

            $total += (float) $distance;

        }

    }

    return round( $total );

}

/**
 * Totale hoogtemeters
 */
function stoopendaal_total_elevation() {

    $posts = get_posts( array(
        'post_type'      => 'route',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'fields'         => 'ids',
    ) );

    $total = 0;

    foreach ( $posts as $post_id ) {

        $hm = get_field( 'elevation', $post_id );

        if ( is_numeric( $hm ) ) {

            $total += (float) $hm;

        }

    }

    return round( $total );

}