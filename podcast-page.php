<?php
/**
 * Podcast Page
 *
 * Premium v2
 * STOOPENDAAL
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * -------------------------------------------------
 * Featured episode
 * -------------------------------------------------
 */

$featured = new WP_Query( array(
    'post_type'           => 'podcast',
    'posts_per_page'      => 1,
    'post_status'         => 'publish',
    'ignore_sticky_posts' => true,
    'no_found_rows'       => true,
) );

$featured_id = 0;

if ( $featured->have_posts() ) {
    $featured_id = $featured->posts[0]->ID;
}

?>

<main id="primary" class="site-main podcast-page">

<!-- =====================================================
     HERO
====================================================== -->

<section class="podcast-hero">

    <div class="podcast-hero__overlay"></div>

    <div class="container">

        <div class="podcast-hero__content">

            <span class="section-label">
                🎙 Ruige Ritten Podcast
            </span>

            <h1>
                Verhalen vanaf het gravel.
            </h1>

            <p>

                Inspirerende gesprekken over gravel,
                bikepacking, routes, materiaal,
                evenementen en bijzondere mensen uit
                de Nederlandse gravelwereld.

            </p>

            <div class="hero-buttons">

                <a href="#episodes"
                   class="btn btn-primary">

                    Nieuwste afleveringen

                </a>

                <a href="#spotify"
                   class="btn btn-secondary">

                    Luister op Spotify

                </a>

            </div>

        </div>

    </div>

</section>

<!-- =====================================================
     PODCAST STATS
====================================================== -->

<section class="podcast-stats">

    <div class="container">

        <div class="podcast-stats__grid">

            <div class="podcast-stat">

                <strong>

                    <?php
                    echo wp_count_posts( 'podcast' )->publish;
                    ?>

                </strong>

                <span>

                    Afleveringen

                </span>

            </div>

            <div class="podcast-stat">

                <strong>

                    11K+

                </strong>

                <span>

                    Dutch Gravel Cycling

                </span>

            </div>

            <div class="podcast-stat">

                <strong>

                    100%

                </strong>

                <span>

                    Gravel Passie

                </span>

            </div>

            <div class="podcast-stat">

                <strong>

                    NL

                </strong>

                <span>

                    Nederlandse Podcast

                </span>

            </div>

        </div>

    </div>

</section>

<!-- =====================================================
     INTRO
====================================================== -->

<section class="podcast-intro">

    <div class="container">

        <div class="section-heading">

            <span class="section-label">

                RUIGE RITTEN

            </span>

            <h2>

                Luister naar verhalen die je onderweg
                meenemen over de mooiste gravelroutes,
                bikepacking-avonturen, materiaal en
                inspirerende gasten.

            </h2>

            <p>

                Geen vluchtige interviews, maar
                uitgebreide gesprekken met mensen
                die het gravelen in Nederland
                bijzonder maken.

            </p>

        </div>

    </div>

</section>

<!-- =====================================================
     FEATURED EPISODE
====================================================== -->

<section class="podcast-featured">

    <div class="container">

        <?php if ( $featured->have_posts() ) : ?>

            <?php while ( $featured->have_posts() ) : $featured->the_post();

                $spotify = get_post_meta(
                    get_the_ID(),
                    '_spotify_url',
                    true
                );

                $guest = get_post_meta(
                    get_the_ID(),
                    '_podcast_guest',
                    true
                );

                $duration = get_post_meta(
                    get_the_ID(),
                    '_podcast_duration',
                    true
                );

            ?>                <article class="featured-episode">

                    <div class="featured-image">

                        <a href="<?php the_permalink(); ?>">

                            <?php if ( has_post_thumbnail() ) : ?>

                                <?php
                                the_post_thumbnail(
                                    'large',
                                    array(
                                        'loading' => 'eager',
                                        'class'   => 'featured-image__img',
                                    )
                                );
                                ?>

                            <?php else : ?>

                                <img
                                    src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/placeholder-podcast.jpg' ); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                >

                            <?php endif; ?>

                        </a>

                    </div>

                    <div class="featured-content">

                        <span class="featured-label">

                            🎙 Nieuwste aflevering

                        </span>

                        <h2>

                            <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                            </a>

                        </h2>

                        <div class="episode-meta">

                            <?php if ( ! empty( $guest ) ) : ?>

                                <span class="episode-meta__item">

                                    👤 <?php echo esc_html( $guest ); ?>

                                </span>

                            <?php endif; ?>

                            <?php if ( ! empty( $duration ) ) : ?>

                                <span class="episode-meta__item">

                                    ⏱ <?php echo esc_html( $duration ); ?>

                                </span>

                            <?php endif; ?>

                            <span class="episode-meta__item">

                                📅 <?php echo esc_html( get_the_date() ); ?>

                            </span>

                        </div>

                        <div class="featured-excerpt">

                            <?php the_excerpt(); ?>

                        </div>

                        <div class="featured-buttons">

                            <?php if ( ! empty( $spotify ) ) : ?>

                                <a
                                    href="<?php echo esc_url( $spotify ); ?>"
                                    target="_blank"
                                    rel="noopener"
                                    class="btn btn-primary"
                                >

                                    Luister op Spotify

                                </a>

                            <?php endif; ?>

                            <a
                                href="<?php the_permalink(); ?>"
                                class="btn btn-outline"
                            >

                                Bekijk aflevering

                            </a>

                        </div>

                    </div>

                </article>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </div>

</section>

<!-- =====================================================
     LAATSTE AFLEVERINGEN
====================================================== -->

<section
    id="episodes"
    class="podcast-episodes"
>

    <div class="container">

        <div class="section-heading">

            <span class="section-label">

                Podcast

            </span>

            <h2>

                Laatste afleveringen

            </h2>

            <p>

                Luister naar de nieuwste gesprekken over
                gravel, bikepacking, routes en materiaal.

            </p>

        </div>

 <?php

$episodes = new WP_Query(
    array(
        'post_type'           => 'podcast',
        'posts_per_page'      => 6,
        'post_status'         => 'publish',
        'ignore_sticky_posts' => true,
        'post__not_in'        => $featured_id ? array( $featured_id ) : array(),
    )
);

?>

<div class="podcast-grid">

<?php if ( $episodes->have_posts() ) : ?>

    <?php while ( $episodes->have_posts() ) : $episodes->the_post();

        $spotify = get_post_meta(
            get_the_ID(),
            '_spotify_url',
            true
        );

        $guest = get_post_meta(
            get_the_ID(),
            '_podcast_guest',
            true
        );

        $duration = get_post_meta(
            get_the_ID(),
            '_podcast_duration',
            true
        );

    ?>

    <?php

set_query_var( 'spotify', $spotify );
set_query_var( 'guest', $guest );
set_query_var( 'duration', $duration );

get_template_part( 'template-parts/podcast/card' );

?>

<?php endwhile; ?>

<?php wp_reset_postdata(); ?>

<?php else : ?>

<div class="podcast-empty">

    ...

</div>

<?php endif; ?>

</div>


</section>

<!-- =====================================================
     SPOTIFY
====================================================== -->

<section
    class="podcast-spotify"
    id="spotify"
>

    <div class="container">

        <div class="spotify-box">

            <div class="spotify-content">

                <span class="section-label">

                    Spotify

                </span>

                <h2>

                    Luister waar je wilt.

                </h2>

                <p>

                    Volg de Ruige Ritten Podcast via Spotify
                    zodat je automatisch iedere nieuwe
                    aflevering ontvangt.

                </p>

                <a
                    href="https://open.spotify.com/embed/show/5tGVg10xuecE8lS8zeF3bt"
                    class="btn btn-primary"
                    target="_blank"
                    rel="noopener"
                >

                    Open Spotify

                </a>

            </div>

            <div class="spotify-player">

                <!--
                    Vervang onderstaande iframe
                    door jouw eigen Spotify Show Embed
                -->
				
                <iframe

                    style="border-radius:20px"

                    src="https://open.spotify.com/episode/4jbnYxe44vnyFXsb7jhXfQ"

                    width="100%"

                    height="352"

                    frameborder="0"

                    allowfullscreen=""

                    loading="lazy"

                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"

                ></iframe>

            </div>

        </div>

    </div>

</section><!-- =====================================================
     GRAVEL ROUTES
====================================================== -->

<section class="podcast-routes">

    <div class="container">

        <div class="section-heading">

            <span class="section-label">

                Gravelroutes

            </span>

            <h2>

                Trek eropuit na het luisteren.

            </h2>

            <p>

                Combineer de podcast met één van de mooiste
                gravelroutes van STOOPENDAAL.

            </p>

        </div>

        <div class="routes-grid">

            <?php

            $routes = new WP_Query(

                array(

                    'post_type'           => 'route',
                    'posts_per_page'      => 3,
                    'post_status'         => 'publish',
                    'ignore_sticky_posts' => true,
                    'no_found_rows'       => true,

                )

            );

            ?>

            <?php if ( $routes->have_posts() ) : ?>

                <?php while ( $routes->have_posts() ) : $routes->the_post(); ?>

                    <?php get_template_part(
                        'template-parts/routes/card'
                    ); ?>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>

    </div>

</section>

<!-- =====================================================
     REVIEWS
====================================================== -->

<section class="podcast-reviews">

    <div class="container">

        <div class="section-heading">

            <span class="section-label">

                Community

            </span>

            <h2>

                Luisteraars aan het woord.

            </h2>

        </div>

        <div class="reviews-grid">

            <article class="review-card">

                <div class="stars">★★★★★</div>

                <p>

                    "Heerlijke podcast tijdens lange gravelritten.
                    Mooie gesprekken en veel inspiratie."

                </p>

                <strong>

                    Gravelrijder

                </strong>

            </article>

            <article class="review-card">

                <div class="stars">★★★★★</div>

                <p>

                    "Professioneel gemaakt en erg ontspannen om
                    naar te luisteren."

                </p>

                <strong>

                    Podcast luisteraar

                </strong>

            </article>

            <article class="review-card">

                <div class="stars">★★★★★</div>

                <p>

                    "Iedere aflevering levert weer nieuwe ideeën
                    voor routes."

                </p>

                <strong>

                    Bikepacker

                </strong>

            </article>

        </div>

    </div>

</section>

<!-- =====================================================
     NEWSLETTER
====================================================== -->

<section class="podcast-newsletter">

    <div class="container">

        <div class="newsletter-box">

            <span class="section-label">

                Nieuwsbrief

            </span>

            <h2>

                Mis geen aflevering meer.

            </h2>

            <p>

                Ontvang automatisch bericht wanneer een nieuwe
                aflevering online staat.

            </p>

            <?php echo do_shortcode('[newsletter]'); ?>

        </div>

    </div>

</section>

<!-- =====================================================
     CTA
====================================================== -->

<section class="podcast-cta">

    <div class="container">

        <div class="podcast-cta__inner">

            <span class="section-label">

                STOOPENDAAL

            </span>

            <h2>

                Meer gravel. Meer avontuur.
                Meer inspiratie.

            </h2>

            <p>

                Ontdek de mooiste gravelroutes,
                luister naar de nieuwste afleveringen
                en ga goed voorbereid op pad.

            </p>

            <div class="podcast-cta__buttons">

                <a
                    href="<?php echo esc_url( home_url( '/routes/' ) ); ?>"
                    class="btn btn-primary"
                >

                    Bekijk routes

                </a>

                <a
                    href="<?php echo esc_url( home_url( '/downloads/' ) ); ?>"
                    class="btn btn-outline"
                >

                    Downloads

                </a>

            </div>

        </div>

    </div>

</section>

</main>

<?php get_footer(); ?>