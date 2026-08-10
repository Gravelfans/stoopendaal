<?php
/**
 * Single Route
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( have_posts() ) :

while ( have_posts() ) :

the_post();

/*
|--------------------------------------------------------------------------
| ACF Velden
|--------------------------------------------------------------------------
*/

$distance       = get_field( 'distance' );
$duration       = get_field( 'duration' );
$elevation      = get_field( 'hoogtemeters' );
$difficulty     = get_field( 'difficulty' );
$province       = get_field( 'regio' );
$start_location = get_field( 'startplaats' );
$surface        = get_field( 'ondergrond' );
$gpx            = get_field( 'gpx_bestand' );
echo '<pre>';
print_r( $gpx );
echo '</pre>';
/*
|--------------------------------------------------------------------------
| Difficulty badge
|--------------------------------------------------------------------------
*/

$badge_type = 'primary';

switch ( strtolower( (string) $difficulty ) ) {

    case 'makkelijk':
        $badge_type = 'easy';
        break;

    case 'gemiddeld':
        $badge_type = 'medium';
        break;

    case 'uitdagend':
        $badge_type = 'hard';
        break;

    case 'expert':
        $badge_type = 'expert';
        break;
}

?>

<main class="single-route">

<section class="route-hero">

    <?php if ( has_post_thumbnail() ) : ?>

        <div class="route-hero__image">

            <?php
            the_post_thumbnail(
                'full',
                array(
                    'loading' => 'eager',
                )
            );
            ?>

        </div>

    <?php endif; ?>

    <div class="route-hero__overlay"></div>

    <div class="container">

        <?php
        get_template_part(
            'template-parts/components/breadcrumbs',
            null,
            array(
                'items' => array(
                    array(
                        'label' => 'Home',
                        'url'   => home_url(),
                    ),
                    array(
                        'label' => 'Routes',
                        'url'   => get_post_type_archive_link( 'route' ),
                    ),
                    array(
                        'label' => get_the_title(),
                    ),
                ),
            )
        );
        ?>

        <div class="route-hero__content">

            <?php
            if ( $difficulty ) {

                get_template_part(
                    'template-parts/components/badge',
                    null,
                    array(
                        'text' => $difficulty,
                        'type' => $badge_type,
                    )
                );

            }
            ?>

            <h1 class="route-hero__title">

                <?php the_title(); ?>

            </h1>

            <?php if ( has_excerpt() ) : ?>

                <p class="route-hero__intro">

                    <?php echo esc_html( get_the_excerpt() ); ?>

                </p>

            <?php endif; ?>

            <div class="route-hero__stats">
/*
|--------------------------------------------------------------------------
| HERO
|--------------------------------------------------------------------------
*/
?>

<section class="route-hero">

<?php if ( has_post_thumbnail() ) : ?>

<div class="route-hero__image">

<?php
the_post_thumbnail(
    'full',
    array(
        'loading' => 'eager',
    )
);
?>

</div>

<?php endif; ?>

<div class="route-hero__overlay"></div>

<div class="container">

<?php

get_template_part(
    'template-parts/components/breadcrumbs',
    null,
    array(
        'items' => array(

            array(
                'label' => 'Home',
                'url'   => home_url(),
            ),

            array(
                'label' => 'Routes',
                'url'   => get_post_type_archive_link( 'route' ),
            ),

            array(
                'label' => get_the_title(),
            ),

        ),
    )
);

?>

<div class="route-hero__content">

<?php

if ( $difficulty ) {

    get_template_part(
        'template-parts/components/badge',
        null,
        array(
            'text' => $difficulty,
            'type' => $badge_type,
        )
    );

}

?>

<h1 class="route-hero__title">

<?php the_title(); ?>

</h1>

<?php if ( has_excerpt() ) : ?>

<p class="route-hero__intro">

<?php echo esc_html( get_the_excerpt() ); ?>

</p>

<?php endif; ?>

<div class="route-hero__stats">

<?php if ( $distance ) : ?>

<div class="route-hero__stat">

<?php stoopendaal_icon( 'distance' ); ?>

<span>

<?php echo esc_html( $distance ); ?> km

</span>

</div>

<?php endif; ?>

<?php if ( $elevation ) : ?>

<div class="route-hero__stat">

<?php stoopendaal_icon( 'elevation' ); ?>

<span>

<?php echo esc_html( $elevation ); ?> hm

</span>

</div>

<?php endif; ?>

<?php if ( $duration ) : ?>

<div class="route-hero__stat">

<?php stoopendaal_icon( 'clock' ); ?>

<span>

<?php echo esc_html( $duration ); ?>

</span>

</div>

<?php endif; ?>

<?php if ( $start_location ) : ?>

<div class="route-hero__stat">

<?php stoopendaal_icon( 'location' ); ?>

<span>

<?php echo esc_html( $start_location ); ?>

</span>

</div>

<?php endif; ?>

</div>

<div class="route-hero__buttons">

<?php

if ( $gpx ) {

    get_template_part(
        'template-parts/components/button',
        null,
        array(
            'label' => 'Download GPX',
            'url'   => $gpx['url'],
            'style' => 'primary',
        )
    );

}

get_template_part(
    'template-parts/components/button',
    null,
    array(
        'label' => 'Alle routes',
        'url'   => get_post_type_archive_link( 'route' ),
        'style' => 'secondary',
    )
);

?>

</div>

</div>

</div>

</section>

<?php
/*
|--------------------------------------------------------------------------
| ROUTE STATS
|--------------------------------------------------------------------------
*/

get_template_part(
    'template-parts/components/stats',
    null,
    array(
        'items' => array_filter(
            array(

                $distance ? array(
                    'number' => $distance . ' km',
                    'label'  => 'Afstand',
                ) : null,

                $elevation ? array(
                    'number' => $elevation . ' hm',
                    'label'  => 'Hoogtemeters',
                ) : null,

                $duration ? array(
                    'number' => $duration,
                    'label'  => 'Duur',
                ) : null,

                $province ? array(
                    'number' => $province,
                    'label'  => 'Regio',
                ) : null,

            )
        ),
    )
);

?><?php
/*
|--------------------------------------------------------------------------
| ROUTE CONTENT
|--------------------------------------------------------------------------
*/
?>

<section class="route-content">

    <div class="container">

        <div class="route-layout">

            <main class="route-main">

                <?php if ( get_the_content() ) : ?>

                    <section class="route-section">

                        <h2>Routebeschrijving</h2>

                        <?php the_content(); ?>

                    </section>

                <?php endif; ?>

                <?php if ( have_rows( 'gallery' ) ) : ?>

                    <section class="route-section">

                        <h2>Foto's</h2>

                        <div class="route-gallery">

                            <?php
                            while ( have_rows( 'gallery' ) ) :
                                the_row();

                                $image = get_sub_field( 'image' );

                                if ( ! $image ) {
                                    continue;
                                }
                            ?>

                                <a
                                    class="route-gallery__item"
                                    href="<?php echo esc_url( $image['url'] ); ?>"
                                >

                                    <img
                                        src="<?php echo esc_url( $image['sizes']['large'] ); ?>"
                                        alt="<?php echo esc_attr( $image['alt'] ); ?>"
                                        loading="lazy"
                                    >

                                </a>

                            <?php endwhile; ?>

                        </div>

                    </section>

                <?php endif; ?>

            </main>

            <aside class="route-sidebar">

                <section class="route-info">

                    <h3>Praktische informatie</h3>

                    <ul>

                        <?php if ( $distance ) : ?>

                            <li>

                                <strong>Afstand</strong>

                                <span>

                                    <?php echo esc_html( $distance ); ?> km

                                </span>

                            </li>

                        <?php endif; ?>

                        <?php if ( $duration ) : ?>

                            <li>

                                <strong>Duur</strong>

                                <span>

                                    <?php echo esc_html( $duration ); ?>

                                </span>

                            </li>

                        <?php endif; ?>

                        <?php if ( $elevation ) : ?>

                            <li>

                                <strong>Hoogtemeters</strong>

                                <span>

                                    <?php echo esc_html( $elevation ); ?> hm

                                </span>

                            </li>

                        <?php endif; ?>

                        <?php if ( $province ) : ?>

                            <li>

                                <strong>Regio</strong>

                                <span>

                                    <?php echo esc_html( $province ); ?>

                                </span>

                            </li>

                        <?php endif; ?>

                        <?php if ( $surface ) : ?>

                            <li>

                                <strong>Ondergrond</strong>

                                <span>

                                    <?php echo esc_html( $surface ); ?>

                                </span>

                            </li>

                        <?php endif; ?>

                        <?php if ( $start_location ) : ?>

                            <li>

                                <strong>Startplaats</strong>

                                <span>

                                    <?php echo esc_html( $start_location ); ?>

                                </span>

                            </li>

                        <?php endif; ?>

                    </ul>

                </section>

<?php if ( $gpx ) : ?>
	
                    <section class="route-download">

    <div class="download-card__icon">
        📥
    </div>

    <h3>Download GPX</h3>

    <p>
        Download deze route en gebruik hem op je
        Garmin, Wahoo, Hammerhead of Bryton.
    </p>

    <?php
    get_template_part(
        'template-parts/components/button',
        null,
        array(
            'label' => 'Download GPX',
            'url'   => $gpx['url'],
            'style' => 'primary',
        )
    );
    ?>

    <small>

        <?php echo esc_html( $gpx['filename'] ); ?>

    </small>

</section>

                <?php endif; ?>

                <?php if ( get_field( 'route_map' ) ) : ?>

                    <section class="route-map">

                        <h3>Routekaart</h3>

                        <?php echo get_field( 'route_map' ); ?>

                    </section>

                <?php endif; ?>

            </aside>

        </div>

    </div>

</section><?php
/*
|--------------------------------------------------------------------------
| GERELATEERDE ROUTES
|--------------------------------------------------------------------------
*/

$related_routes = new WP_Query(
    array(
        'post_type'      => 'route',
        'posts_per_page' => 3,
        'post__not_in'   => array( get_the_ID() ),
        'orderby'        => 'rand',
    )
);

if ( $related_routes->have_posts() ) :
?>

<section class="related-routes">

    <div class="container">

        <?php
        get_template_part(
            'template-parts/components/section-heading',
            null,
            array(
                'label' => 'Ontdek meer',
                'title' => 'Gerelateerde gravelroutes',
                'text'  => 'Misschien zijn deze routes ook iets voor jou.',
            )
        );
        ?>

        <div class="routes-grid">

            <?php
            while ( $related_routes->have_posts() ) :

                $related_routes->the_post();

                get_template_part(
                    'template-parts/routes/card',
                    null,
                    array(
                        'distance'   => get_field( 'distance' ),
                        'duration'   => get_field( 'duration' ),
                        'elevation'  => get_field( 'hoogtemeters' ),
                        'difficulty' => get_field( 'difficulty' ),
                        'summary'    => get_field( 'summary' ),
                        'regio'      => get_field( 'regio' ),
                    )
                );

            endwhile;

            wp_reset_postdata();
            ?>

        </div>

    </div>

</section>

<?php endif; ?>


<?php
/*
|--------------------------------------------------------------------------
| CTA
|--------------------------------------------------------------------------
*/

get_template_part(
    'template-parts/components/cta',
    null,
    array(
        'label'         => 'Gratis GPX',
        'title'         => 'Ontdek nog meer gravelroutes',
        'text'          => 'Bekijk honderden zorgvuldig geselecteerde gravelroutes door heel Nederland en download gratis de GPX-bestanden.',
        'button'        => 'Bekijk alle routes',
        'button_url'    => get_post_type_archive_link( 'route' ),
        'secondary'     => 'Neem contact op',
        'secondary_url' => home_url( '/contact/' ),
    )
);

?>

</main>

<?php

endwhile;

endif;

get_footer();