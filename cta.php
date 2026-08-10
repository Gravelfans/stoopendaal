<?php
/**
 * Route CTA
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$gpx = get_field( 'gpx_bestand' );
?>

<section class="route-cta">

    <div class="container">

        <div class="route-cta-box">

            <span class="route-section-label">
                Klaar voor avontuur?
            </span>

            <h2>

                Trek eropuit en ontdek deze prachtige gravelroute.

            </h2>

            <p>

                Download gratis de GPX, laad hem op je Garmin,
                Wahoo of Komoot en geniet van een prachtige rit.

            </p>

            <div class="route-cta-buttons">

                <?php if ( $gpx ) : ?>

                    <a
                        class="route-cta-primary"
                        href="<?php echo esc_url( $gpx['url'] ); ?>"
                        download>

                        Download GPX

                    </a>

                <?php endif; ?>

                <a
                    class="route-cta-secondary"
                    href="<?php echo esc_url( get_post_type_archive_link( 'route' ) ); ?>">

                    Bekijk alle routes

                </a>

            </div>

        </div>

    </div>

</section>