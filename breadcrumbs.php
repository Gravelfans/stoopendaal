<?php
/**
 * Breadcrumbs Component
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
    'breadcrumbs',
);

if ( ! empty( $args['class'] ) ) {
    $classes[] = $args['class'];
}
?>

<nav
    class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>"
    aria-label="<?php esc_attr_e( 'Breadcrumb', 'stoopendaal' ); ?>"
>

    <ol class="breadcrumbs__list">

        <?php foreach ( $args['items'] as $index => $item ) : ?>

            <li class="breadcrumbs__item">

                <?php if ( ! empty( $item['url'] ) && $index < count( $args['items'] ) - 1 ) : ?>

                    <a
                        href="<?php echo esc_url( $item['url'] ); ?>"
                        class="breadcrumbs__link"
                    >

                        <?php echo esc_html( $item['label'] ); ?>

                    </a>

                <?php else : ?>

                    <span
                        class="breadcrumbs__current"
                        aria-current="page"
                    >

                        <?php echo esc_html( $item['label'] ); ?>

                    </span>

                <?php endif; ?>

            </li>

        <?php endforeach; ?>

    </ol>

</nav>