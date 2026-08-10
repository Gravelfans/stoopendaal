<?php
/**
 * Section Heading Component
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
    $args ?? array(),
    array(
        'label'      => '',
        'title'      => '',
        'text'       => '',
        'align'      => 'center',
        'class'      => '',
    )
);

$classes = array(
    'section-heading',
    'section-heading--' . $args['align'],
);

if ( ! empty( $args['class'] ) ) {
    $classes[] = $args['class'];
}
?>

<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

    <?php if ( ! empty( $args['label'] ) ) : ?>

        <span class="section-label">

            <?php echo esc_html( $args['label'] ); ?>

        </span>

    <?php endif; ?>

    <?php if ( ! empty( $args['title'] ) ) : ?>

        <h2 class="section-title">

            <?php echo esc_html( $args['title'] ); ?>

        </h2>

    <?php endif; ?>

    <?php if ( ! empty( $args['text'] ) ) : ?>

        <p class="section-description">

            <?php echo esc_html( $args['text'] ); ?>

        </p>

    <?php endif; ?>

</div>