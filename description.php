<?php
/**
 * Route Description
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$summary = get_field( 'summary' );

if ( ! $summary && ! get_the_content() ) {
    return;
}
?>

<section class="route-description">

    <div class="container">

        <div class="route-description__grid">

            <div class="route-description__content">

                <span class="route-section-label">
                    Routebeschrijving
                </span>

                <h2>
                    Ontdek deze route
                </h2>

                <?php if ( $summary ) : ?>

                    <div class="route-intro">

                        <?php echo wpautop( esc_html( $summary ) ); ?>

                    </div>

                <?php endif; ?>

                <div class="route-content">

                    <?php the_content(); ?>

                </div>

            </div>

            <aside class="route-description__aside">

                <div class="route-info-card">

                    <h3>Waarom deze route?</h3>

                    <ul>

                        <li>✔ Zelf gereden en gecontroleerd</li>

                        <li>✔ Inclusief GPX-download</li>

                        <li>✔ Praktische informatie</li>

                        <li>✔ Hoogteprofiel beschikbaar</li>

                        <li>✔ Gratis te downloaden</li>

                    </ul>

                </div>

            </aside>

        </div>

    </div>

</section>