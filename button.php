<?php
/**
 * Button component
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
    $args,
    array(
        'label'  => '',
        'url'    => '#',
        'style'  => 'primary',
        'icon'   => true,
        'target' => '',
        'rel'    => '',
    )
);

$class = 'btn btn--' . sanitize_html_class( $args['style'] );
?>

<a
    href="<?php echo esc_url( $args['url'] ); ?>"
    class="<?php echo esc_attr( $class ); ?>"
    <?php if ( ! empty( $args['target'] ) ) : ?>
        target="<?php echo esc_attr( $args['target'] ); ?>"
    <?php endif; ?>
    <?php if ( ! empty( $args['rel'] ) ) : ?>
        rel="<?php echo esc_attr( $args['rel'] ); ?>"
    <?php endif; ?>
>

    <span class="btn__label">

        <?php echo esc_html( $args['label'] ); ?>

    </span>

    <?php if ( $args['icon'] ) : ?>

        <span
            class="btn__arrow"
            aria-hidden="true"
        >
            →
        </span>

    <?php endif; ?>

</a>