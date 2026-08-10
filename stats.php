<?php
/**
 * Route Stats
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$distance   = get_field( 'distance' );
$duration   = get_field( 'duration' );
$elevation  = get_field( 'hoogtemeters' );
$difficulty = get_field( 'difficulty' );
$regio      = get_field( 'regio' );
$gravel     = get_field( 'gravelpercentage' );

if (
    ! $distance &&
    ! $duration &&
    ! $elevation &&
    ! $difficulty &&
    ! $regio &&
    ! $gravel
){
    return;
}
?>

<section class="route-stats">

    <div class="container">

        <div class="route-stats-grid">

            <?php if ( $distance ) : ?>

                <div class="route-stat-card">

                    <div class="route-stat-icon">📏</div>

                    <div class="route-stat-value">
                        <?php echo esc_html( $distance ); ?> km
                    </div>

                    <div class="route-stat-label">
                        Afstand
                    </div>

                </div>

            <?php endif; ?>


            <?php if ( $elevation ) : ?>

                <div class="route-stat-card">

                    <div class="route-stat-icon">⛰</div>

                    <div class="route-stat-value">
                        <?php echo esc_html( $elevation ); ?> hm
                    </div>

                    <div class="route-stat-label">
                        Hoogtemeters
                    </div>

                </div>

            <?php endif; ?>


            <?php if ( $duration ) : ?>

                <div class="route-stat-card">

                    <div class="route-stat-icon">⏱</div>

                    <div class="route-stat-value">
                        <?php echo esc_html( $duration ); ?>
                    </div>

                    <div class="route-stat-label">
                        Duur
                    </div>

                </div>

            <?php endif; ?>


            <?php if ( $difficulty ) : ?>

                <div class="route-stat-card">

                    <div class="route-stat-icon">⭐</div>

                    <div class="route-stat-value">

                        <?php echo esc_html( ucfirst( $difficulty ) ); ?>

                    </div>

                    <div class="route-stat-label">
                        Moeilijkheid
                    </div>

                </div>

            <?php endif; ?>


            <?php if ( $regio ) : ?>

                <div class="route-stat-card">

                    <div class="route-stat-icon">📍</div>

                    <div class="route-stat-value">

                        <?php echo esc_html( $regio ); ?>

                    </div>

                    <div class="route-stat-label">
                        Regio
                    </div>

                </div>

            <?php endif; ?>


            <?php if ( $gravel ) : ?>

                <div class="route-stat-card">

                    <div class="route-stat-icon">🚴</div>

                    <div class="route-stat-value">

                        <?php echo esc_html( $gravel ); ?>%

                    </div>

                    <div class="route-stat-label">
                        Gravel

                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</section>