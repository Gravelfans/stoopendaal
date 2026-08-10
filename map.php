<?php
/**
 * Route Map
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$map = get_field( 'kaart_embed' );

if ( ! $map ) {
    return;
}
?>

<section class="route-map">

    <div class="container">

        <div class="route-map-header">

            <span class="route-section-label">
                Routekaart
            </span>

            <h2>
                Bekijk de route op de kaart
            </h2>

            <p>
                Verken de volledige route en plan jouw volgende gravelavontuur.
            </p>

        </div>

        <div class="route-map-wrapper">

            <?php echo $map; ?>

        </div>

    </div>

</section>