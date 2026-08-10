<?php
/**
 * Empty State Component
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
    $args ?? array(),
    array(
        'icon'        => '🚴',
        'title'       => 'Geen resultaten gevonden',
        'text'        => '',
        'button'      => '',
        'button_url'  => '',
        'class'       => '',
    )
);

$classes = array(
    'empty-state',
);

if ( ! empty( $args['class'] ) ) {
    $classes[] = $args['class'];
}
?>

<section class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

    <div class="empty-state__inner">

        <div class="empty-state__icon">

            <?php echo esc_html( $args['icon'] ); ?>

        </div>

        <h2 class="empty-state__title">

            <?php echo esc_html( $args['title'] ); ?>

        </h2>

        <?php if ( ! empty( $args['text'] ) ) : ?>

            <p class="empty-state__text">

                <?php echo esc_html( $args['text'] ); ?>

            </p>

        <?php endif; ?>

        <?php
        if ( ! empty( $args['button'] ) ) {

            get_template_part(
                'template-parts/components/button',
                null,
                array(
                    'label' => $args['button'],
                    'url'   => $args['button_url'],
                    'style' => 'primary',
                )
            );

        }
        ?>

    </div>

</section>