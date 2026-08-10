<?php
/**
 * Practical Information
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$startplaats     = get_field( 'startplaats' );
$startadres      = get_field( 'startadres' );
$gps             = get_field( 'gps_coordinaten' );
$provincie       = get_field( 'provincie' );
$ondergrond      = get_field( 'ondergrond' );
$seizoen         = get_field( 'beste_seizoen' );
$fietssoort      = get_field( 'fietssoort' );

if (
    ! $startplaats &&
    ! $startadres &&
    ! $gps &&
    ! $provincie &&
    ! $ondergrond &&
    ! $seizoen &&
    ! $fietssoort
){
    return;
}
?>

<section class="route-practical">

    <div class="container">

        <div class="route-practical-header">

            <span class="route-section-label">
                Praktische informatie
            </span>

            <h2>
                Alles wat je moet weten
            </h2>

        </div>

        <div class="route-practical-grid">

            <?php if($startplaats): ?>

            <div class="info-item">
                <strong>📍 Startplaats</strong>
                <span><?php echo esc_html($startplaats); ?></span>
            </div>

            <?php endif; ?>

            <?php if($startadres): ?>

            <div class="info-item">
                <strong>🅿 Startadres</strong>
                <span><?php echo esc_html($startadres); ?></span>
            </div>

            <?php endif; ?>

            <?php if($gps): ?>

            <div class="info-item">
                <strong>🧭 GPS</strong>
                <span><?php echo esc_html($gps); ?></span>
            </div>

            <?php endif; ?>

            <?php if($provincie): ?>

            <div class="info-item">
                <strong>🇳🇱 Provincie</strong>
                <span><?php echo esc_html($provincie); ?></span>
            </div>

            <?php endif; ?>

            <?php if($ondergrond): ?>

            <div class="info-item">
                <strong>🚴 Ondergrond</strong>
                <span><?php echo esc_html($ondergrond); ?></span>
            </div>

            <?php endif; ?>

            <?php if($seizoen): ?>

            <div class="info-item">
                <strong>🌿 Beste seizoen</strong>
                <span><?php echo esc_html($seizoen); ?></span>
            </div>

            <?php endif; ?>

            <?php if($fietssoort): ?>

            <div class="info-item">
                <strong>🚲 Fietssoort</strong>
                <span><?php echo esc_html($fietssoort); ?></span>
            </div>

            <?php endif; ?>

        </div>

    </div>

</section>