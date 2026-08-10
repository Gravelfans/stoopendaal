<?php
/**
 * Route Hero
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$distance   = get_field( 'distance' );
$duration   = get_field( 'duration' );
$elevation  = get_field( 'hoogtemeters' );
$difficulty = get_field( 'difficulty' );
$summary    = get_field( 'summary' );
$regio      = get_field( 'regio' );
?>

<section class="route-hero">

    <div class="route-hero__image">

        <?php if ( has_post_thumbnail() ) : ?>

            <?php the_post_thumbnail( 'full' ); ?>

        <?php endif; ?>

        <div class="route-hero__overlay"></div>

    </div>

    <div class="container">

        <div class="route-hero__content">

            <?php if ( $regio ) : ?>

                <span class="route-hero__region">

                    📍 <?php echo esc_html( $regio ); ?>

                </span>

            <?php endif; ?>

            <h1 class="route-hero__title">

                <?php the_title(); ?>

            </h1>

            <?php if ( $summary ) : ?>

                <p class="route-hero__summary">

                    <?php echo esc_html( $summary ); ?>

                </p>

            <?php endif; ?>

            <div class="route-hero__stats">

                <?php if ( $distance ) : ?>

                    <div class="route-stat">

                        <strong><?php echo esc_html( $distance ); ?> km</strong>

                        <span>Afstand</span>

                    </div>

                <?php endif; ?>

                <?php if ( $elevation ) : ?>

                    <div class="route-stat">

                        <strong><?php echo esc_html( $elevation ); ?> hm</strong>

                        <span>Hoogtemeters</span>

                    </div>

                <?php endif; ?>

                <?php if ( $duration ) : ?>

                    <div class="route-stat">

                        <strong><?php echo esc_html( $duration ); ?></strong>

                        <span>Duur</span>

                    </div>

                <?php endif; ?>

                <?php if ( $difficulty ) : ?>

                    <div class="route-stat">

                        <strong><?php echo esc_html( $difficulty ); ?></strong>

                        <span>Moeilijkheid</span>

                    </div>

                <?php endif; ?>

            </div>

            <?php
            $gpx = get_field( 'gpx_bestand' );

            if ( $gpx ) :
            ?>

                <a
                    href="<?php echo esc_url( $gpx['url'] ); ?>"
                    class="btn btn--primary"
                    download
                >
                    Download GPX
                </a>

            <?php endif; ?>

        </div>

    </div>

</section>