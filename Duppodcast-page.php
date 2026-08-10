<?php
/**
 * Template Name: Podcast
 */

get_header();
?>

<main id="primary" class="site-main podcast-page">

<?php

$featured = new WP_Query(array(
    'post_type'      => 'podcast',
    'posts_per_page' => 1,
    'post_status'    => 'publish'
));

?>

<!-- ==========================================
     HERO
========================================== -->

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

                Inspirerende gesprekken over gravel, bikepacking,
                routes, materiaal en bijzondere mensen uit de
                Nederlandse fietswereld.

            </p>

            <div class="hero-buttons">

    <a href="#spotify" class="btn btn-glass">

        Luister op Spotify

    </a>

    <a href="#afleveringen" class="btn btn-glass-outline">

        Bekijk afleveringen

    </a>

</div>

        </div>

    </div>

</section>


<!-- ==========================================
     INTRO
========================================== -->

<section class="podcast-intro">

    <div class="container">

        <div class="section-heading">

            <span class="hero-badge">

    Ruige Ritten Podcast

</span>

            <h2>

                Gravelverhalen die je onderweg wilt luisteren.

            </h2>

            <p>

                Geen snelle interviews, maar rustige gesprekken
                over avontuur, routes, materiaal en alles wat
                gravelen zo bijzonder maakt.

            </p>

        </div>

    </div>

</section>


<!-- ==========================================
     UITGELICHTE AFLEVERING
========================================== -->

<section class="podcast-featured">

    <div class="container">

        <?php if ($featured->have_posts()) : ?>

            <?php while ($featured->have_posts()) : $featured->the_post();

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

            <article class="featured-episode">

                <div class="featured-episode__image">

                    <a href="<?php the_permalink(); ?>">

                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                        }
                        ?>

                    </a>

                </div>

                <div class="featured-episode__content">

                    <span class="featured-label">

                        Nieuwste aflevering

                    </span>

                    <h2>

                        <a href="<?php the_permalink(); ?>">

                            <?php the_title(); ?>

                        </a>

                    </h2>

                    <?php if ($guest || $duration) : ?>

                        <div class="featured-meta">

                            <?php if ($guest) : ?>

                                <span>

                                    🎙 <?php echo esc_html($guest); ?>

                                </span>

                            <?php endif; ?>

                            <?php if ($duration) : ?>

                                <span>

                                    ⏱ <?php echo esc_html($duration); ?>

                                </span>

                            <?php endif; ?>

                        </div>

                    <?php endif; ?>

                    <p>

                        <?php echo wp_trim_words(get_the_excerpt(), 40); ?>

                    </p>

                    <div class="featured-buttons">

                        <?php if ($spotify) : ?>

                            <a href="<?php echo esc_url($spotify); ?>"
                               target="_blank"
                               rel="noopener"
                               class="btn btn-primary">

                                Luister op Spotify

                            </a>

                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>"
                           class="btn btn-secondary">

                            Meer informatie

                        </a>

                    </div>

                </div>

            </article>

            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php endif; ?>

    </div>

</section><!-- ==========================================
     LAATSTE AFLEVERINGEN
========================================== -->

<section class="podcast-episodes" id="afleveringen">

    <div class="container">

        <div class="section-heading">

            <span class="section-label">

                Laatste afleveringen

            </span>

            <h2>

                Luister onderweg naar de nieuwste gesprekken.

            </h2>

            <p>

                Ontdek inspirerende gasten, mooie routes en verhalen
                die je direct zin geven om op de fiets te stappen.

            </p>

        </div>

        <div class="podcast-grid">

            <?php

            $episodes = new WP_Query(array(
                'post_type'      => 'podcast',
                'posts_per_page' => 6,
                'offset'         => 1,
                'post_status'    => 'publish'
            ));

            ?>

            <?php if ($episodes->have_posts()) : ?>

                <?php while ($episodes->have_posts()) : $episodes->the_post();

                    $spotify = get_post_meta(get_the_ID(), '_spotify_url', true);
                    $guest   = get_post_meta(get_the_ID(), '_podcast_guest', true);
                    $duration = get_post_meta(get_the_ID(), '_podcast_duration', true);

                ?>

                <article class="podcast-card">

                    <a href="<?php the_permalink(); ?>" class="podcast-card__image">

                        <?php

                        if (has_post_thumbnail()) {

                            the_post_thumbnail('large');

                        }

                        ?>

                    </a>

                    <div class="podcast-card__content">

                        <div class="podcast-card__meta">

                            <?php if ($guest) : ?>

                                <span><?php echo esc_html($guest); ?></span>

                            <?php endif; ?>

                            <?php if ($duration) : ?>

                                <span><?php echo esc_html($duration); ?></span>

                            <?php endif; ?>

                        </div>

                        <h3>

                            <a href="<?php the_permalink(); ?>">

                                <?php the_title(); ?>

                            </a>

                        </h3>

                        <p>

                            <?php echo wp_trim_words(get_the_excerpt(),18); ?>

                        </p>

                        <div class="podcast-card__buttons">

                            <?php if ($spotify) : ?>

                                <a href="<?php echo esc_url($spotify); ?>"
                                   target="_blank"
                                   rel="noopener"
                                   class="btn btn-primary">

                                    Spotify

                                </a>

                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>"
                               class="btn btn-outline">

                                Lees meer

                            </a>

                        </div>

                    </div>

                </article>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>

        </div>

    </div>

</section>


<!-- ==========================================
     SPOTIFY
========================================== -->

<section class="podcast-spotify" id="spotify">

    <div class="container">

        <div class="spotify-box">

            <div class="spotify-content">

                <span class="section-label">

                    Spotify

                </span>

                <h2>

                    Luister waar en wanneer je wilt.

                </h2>

                <p>

                    Volg de Ruige Ritten Podcast op Spotify en blijf
                    automatisch op de hoogte van iedere nieuwe aflevering.

                </p>

                <a href="https://open.spotify.com/"
                   target="_blank"
                   rel="noopener"
                   class="btn btn-primary">

                    Open Spotify

                </a>

            </div>

            <div class="spotify-player">

                <iframe
                    style="border-radius:20px"
                    src="https://open.spotify.com/embed/show/"
                    width="100%"
                    height="352"
                    frameborder="0"
                    allowfullscreen=""
                    allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture">
                </iframe>

            </div>

        </div>

    </div>

</section>


<!-- ==========================================
     ONTDEK OOK DEZE ROUTES
========================================== -->

<section class="podcast-routes">

    <div class="container">

        <div class="section-heading">

            <span class="section-label">

                Verder ontdekken

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

            $routes = new WP_Query(array(
                'post_type'      => 'route',
                'posts_per_page' => 3,
                'post_status'    => 'publish'
            ));

            if ($routes->have_posts()) :

                while ($routes->have_posts()) :

                    $routes->the_post();

                    get_template_part(
                        'template-parts/routes/card'
                    );

                endwhile;

                wp_reset_postdata();

            endif;

            ?>

        </div>

    </div>

</section><!-- ==========================================
     CALL TO ACTION
========================================== -->

<section class="podcast-cta">

    <div class="container">

        <div class="podcast-cta__inner">

            <span class="section-label">

                STOOPENDAAL

            </span>

            <h2>

                Meer gravel. Meer avontuur. Meer inspiratie.

            </h2>

            <p>

                Ontdek de mooiste gravelroutes van Nederland,
                luister naar nieuwe afleveringen van de Ruige
                Ritten Podcast en ga goed voorbereid op pad.

            </p>

            <div class="podcast-cta__buttons">

                <a href="<?php echo esc_url(home_url('/routes/')); ?>"
                   class="btn btn-primary">

                    Bekijk routes

                </a>

                <a href="<?php echo esc_url(home_url('/downloads/')); ?>"
                   class="btn btn-secondary">

                    Downloads

                </a>

            </div>

        </div>

    </div>

</section>

</main>

<?php get_footer(); ?>