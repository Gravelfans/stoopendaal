<?php
/**
 * CTA Component
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
    $args ?? array(),
    array(
        'label'         => '',
        'title'         => '',
        'text'          => '',
        'button'        => '',
        'button_url'    => '',
        'secondary'     => '',
        'secondary_url' => '',
        'class'         => '',
    )
);

$classes = array(
    'cta',
);

if ( ! empty( $args['class'] ) ) {
    $classes[] = $args['class'];
}
?>

<section class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

    <div class="container">

        <div class="cta__inner">

            <?php if ( ! empty( $args['label'] ) ) : ?>

                <span class="cta__label">

                    <?php echo esc_html( $args['label'] ); ?>

                </span>

            <?php endif; ?>

            <?php if ( ! empty( $args['title'] ) ) : ?>

                <h2 class="cta__title">

                    <?php echo esc_html( $args['title'] ); ?>

                </h2>

            <?php endif; ?>

            <?php if ( ! empty( $args['text'] ) ) : ?>

                <p class="cta__text">

                    <?php echo esc_html( $args['text'] ); ?>

                </p>

            <?php endif; ?>

            <?php if ( ! empty( $args['button'] ) || ! empty( $args['secondary'] ) ) : ?>

                <div class="cta__buttons">

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

                    if ( ! empty( $args['secondary'] ) ) {

                        get_template_part(
                            'template-parts/components/button',
                            null,
                            array(
                                'label' => $args['secondary'],
                                'url'   => $args['secondary_url'],
                                'style' => 'secondary',
                            )
                        );

                    }
                    ?>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>