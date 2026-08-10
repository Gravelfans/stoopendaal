<?php
/**
 * Route Card
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
    $args ?? array(),
    array(
        'distance'   => '',
        'duration'   => '',
        'elevation'  => '',
        'difficulty' => '',
        'summary'    => '',
        'regio'      => '',
    )
);

$distance   = $args['distance'];
$duration   = $args['duration'];
$elevation  = $args['elevation'];
$difficulty = $args['difficulty'];
$summary    = $args['summary'];
$regio      = $args['regio'];

$difficulty_type = sanitize_title( $difficulty );
?>

<article class="route-card">

    <a
        href="<?php the_permalink(); ?>"
        class="route-card__image"
    >

        <?php if ( has_post_thumbnail() ) : ?>

            <?php
            the_post_thumbnail(
                'large',
                array(
                    'loading' => 'lazy',
                )
            );
            ?>

        <?php else : ?>

            <img
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/default-route.jpg' ); ?>"
                alt="<?php the_title_attribute(); ?>"
                loading="lazy"
            >

        <?php endif; ?>

        <?php
        if ( ! empty( $difficulty ) ) {

            get_template_part(
                'template-parts/components/badge',
                null,
                array(
                    'text' => $difficulty,
                    'type' => $difficulty_type,
                )
            );

        }
        ?>

    </a>

    <div class="route-card__content">

        <?php if ( ! empty( $regio ) ) : ?>

            <div class="route-card__region">

                <?php
                if ( function_exists( 'stoopendaal_icon' ) ) {
                    stoopendaal_icon( 'location' );
                }
                ?>

                <span>

                    <?php echo esc_html( $regio ); ?>

                </span>

            </div>

        <?php endif; ?>

        <h3 class="route-card__title">

            <a href="<?php the_permalink(); ?>">

                <?php the_title(); ?>

            </a>

        </h3>

        <?php if ( ! empty( $summary ) ) : ?>

            <p class="route-card__summary">

                <?php echo esc_html( wp_trim_words( $summary, 22 ) ); ?>

            </p>

        <?php endif; ?>

        <div class="route-card__meta">

            <?php if ( ! empty( $distance ) ) : ?>

                <div class="route-card__stat">

                    <?php
                    if ( function_exists( 'stoopendaal_icon' ) ) {
                        stoopendaal_icon( 'distance' );
                    }
                    ?>

                    <span>

                        <?php echo esc_html( $distance ); ?> km

                    </span>

                </div>

            <?php endif; ?>

            <?php if ( ! empty( $elevation ) ) : ?>

                <div class="route-card__stat">

                    <?php
                    if ( function_exists( 'stoopendaal_icon' ) ) {
                        stoopendaal_icon( 'elevation' );
                    }
                    ?>

                    <span>

                        <?php echo esc_html( $elevation ); ?> hm

                    </span>

                </div>

            <?php endif; ?>

            <?php if ( ! empty( $duration ) ) : ?>

                <div class="route-card__stat">

                    <span>⏱</span>

                    <span>

                        <?php echo esc_html( $duration ); ?>

                    </span>

                </div>

            <?php endif; ?>

        </div>

        <?php
        get_template_part(
            'template-parts/components/button',
            null,
            array(
                'label' => 'Bekijk route',
                'url'   => get_permalink(),
                'style' => 'primary',
            )
        );
        ?>

    </div>

</article>