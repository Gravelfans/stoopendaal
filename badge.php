<?php
/**
 * Badge Component
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
    $args ?? array(),
    array(
        'text' => '',
        'type' => 'primary',
    )
);

if ( empty( $args['text'] ) ) {
    return;
}
?>

<span class="badge badge--<?php echo esc_attr( $args['type'] ); ?>">

    <?php echo esc_html( $args['text'] ); ?>

</span>