<?php
/**
 * Stats Component
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
    $args ?? array(),
    array(
        'items' => array(),
        'class' => '',
    )
);

if ( empty( $args['items'] ) ) {
    return;
}

$classes = array(
    'stats',
);

if ( ! empty( $args['class'] ) ) {
    $classes[] = $args['class'];
}
?>

<section class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

    <div class="container">

        <div class="stats__grid">

            <?php foreach ( $args['items'] as $item ) : ?>

                <div class="stats__item">

                    <?php if ( ! empty( $item['number'] ) ) : ?>

                        <div class="stats__number">

                            <?php echo esc_html( $item['number'] ); ?>

                        </div>

                    <?php endif; ?>

                    <?php if ( ! empty( $item['label'] ) ) : ?>

                        <div class="stats__label">

                            <?php echo esc_html( $item['label'] ); ?>

                        </div>

                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        </div>

    </div>

</section>