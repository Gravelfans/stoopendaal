<?php
/**
 * Card Component
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
    $args ?? array(),
    array(
        'image'  => '',
        'badge'  => '',
        'type'   => 'primary',
        'title'  => '',
        'text'   => '',
        'meta'   => '',
        'url'    => '',
        'button' => '',
        'class'  => '',
    )
);

$classes = array(
    'card',
);

if ( ! empty( $args['class'] ) ) {
    $classes[] = $args['class'];
}
?>

<article class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">

    <?php if ( ! empty( $args['image'] ) ) : ?>

        <a
            href="<?php echo esc_url( $args['url'] ); ?>"
            class="card__image"
        >

            <img
                src="<?php echo esc_url( $args['image'] ); ?>"
                alt=""
                loading="lazy"
            >

            <?php
            if ( ! empty( $args['badge'] ) ) {

                get_template_part(
                    'template-parts/components/badge',
                    null,
                    array(
                        'text' => $args['badge'],
                        'type' => $args['type'],
                    )
                );

            }
            ?>

        </a>

    <?php endif; ?>

    <div class="card__content">

        <?php if ( ! empty( $args['title'] ) ) : ?>

            <h3 class="card__title">

                <a href="<?php echo esc_url( $args['url'] ); ?>">

                    <?php echo esc_html( $args['title'] ); ?>

                </a>

            </h3>

        <?php endif; ?>

        <?php if ( ! empty( $args['meta'] ) ) : ?>

            <div class="card__meta">

                <?php echo wp_kses_post( $args['meta'] ); ?>

            </div>

        <?php endif; ?>

        <?php if ( ! empty( $args['text'] ) ) : ?>

            <p class="card__text">

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
                    'url'   => $args['url'],
                    'style' => 'primary',
                )
            );

        }
        ?>

    </div>

</article>