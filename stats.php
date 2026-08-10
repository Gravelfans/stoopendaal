<?php
/**
 * Route Stats
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$distance   = get_field('distance');
$duration   = get_field('duration');
$elevation  = get_field('elevation');
$difficulty = get_field('difficulty');
?>

<section class="route-stats">

    <div class="container">

        <div class="stats-grid">

            <?php if($distance): ?>

                <article class="stat-card">
                    <span class="stat-label">Afstand</span>
                    <h3><?php echo esc_html($distance); ?></h3>
                </article>

            <?php endif; ?>

            <?php if($duration): ?>

                <article class="stat-card">
                    <span class="stat-label">Duur</span>
                    <h3><?php echo esc_html($duration); ?></h3>
                </article>

            <?php endif; ?>

            <?php if($elevation): ?>

                <article class="stat-card">
                    <span class="stat-label">Hoogtemeters</span>
                    <h3><?php echo esc_html($elevation); ?> m</h3>
                </article>

            <?php endif; ?>

            <?php if($difficulty): ?>

                <article class="stat-card">
                    <span class="stat-label">Moeilijkheid</span>
                    <h3><?php echo esc_html($difficulty); ?></h3>
                </article>

            <?php endif; ?>

        </div>

    </div>

</section>