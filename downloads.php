<?php
/**
 * Route Downloads
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$gpx = get_field( 'gpx_bestand' );

if ( empty( $gpx ) ) {
    return;
}
?>

<aside class="download-card">

    <div class="download-card__icon">
        📥
    </div>

    <h3 class="download-card__title">
        Download GPX
    </h3>

    <p class="download-card__text">
        Download deze route en gebruik hem op je
        Garmin, Wahoo, Hammerhead of Bryton.
    </p>

    <a
        href="<?php echo esc_url( $gpx['url'] ); ?>"
        class="btn btn--primary w-100"
        download
    >
        Download GPX
    </a>

    <div class="download-card__filename">
        <?php echo esc_html( $gpx['filename'] ); ?>
    </div>

</aside>