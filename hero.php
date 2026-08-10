<?php
/**
 * Hero Component
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
        'image'         => '',
        'button'        => '',
        'button_url'    => '',
        'button_style'  => 'primary',
        'secondary'     => '',
        'secondary_url' => '',
        'class'         => '',
    )
);

$classes = array(
    'hero',
);

if ( ! empty( $args['class'] ) ) {
    $classes[] = $args['class'];
}
?>

<section class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

    <div class="container">

        <div class="hero__grid">

            <div class="hero__content">

                <?php if ( ! empty( $args['label'] ) ) : ?>

                    <span class="hero__label">

                        <?php echo esc_html( $args['label'] ); ?>

                    </span>

                <?php endif; ?>

                <?php if ( ! empty( $args['title'] ) ) : ?>

                    <h1 class="hero__title">

                        <?php echo esc_html( $args['title'] ); ?>

                    </h1>

                <?php endif; ?>

                <?php if ( ! empty( $args['text'] ) ) : ?>

                    <p class="hero__text">

                        <?php echo esc_html( $args['text'] ); ?>

                    </p>

                <?php endif; ?>

                <?php if ( ! empty( $args['button'] ) || ! empty( $args['secondary'] ) ) : ?>

                    <div class="hero__buttons">

                        <?php
                        if ( ! empty( $args['button'] ) ) {

                            get_template_part(
                                'template-parts/components/button',
                                null,
                                array(
                                    'label' => $args['button'],
                                    'url'   => $args['button_url'],
                                    'style' => $args['button_style'],
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

            <?php if ( ! empty( $args['image'] ) ) : ?>

                <div class="hero__image">

                    <img
                        src="<?php echo esc_url( $args['image'] ); ?>"
                        alt=""
                        loading="eager"
                    >

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>