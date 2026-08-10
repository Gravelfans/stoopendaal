<?php
/**
 * Podcast Card
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$spotify = get_query_var( 'spotify' );
$guest    = get_query_var( 'guest' );
$duration = get_query_var( 'duration' );

$recorded = get_post_meta(
    get_the_ID(),
    '_podcast_recorded',
    true
);

?>

<article class="podcast-card">

    <div class="podcast-card__body">

        <div class="podcast-card__badge">

            <span class="podcast-dot"></span>

            <span>PODCAST</span>

        </div>

        <h3 class="podcast-card__title">

            <a href="<?php the_permalink(); ?>">

                <?php the_title(); ?>

            </a>

        </h3>

        <?php if ( ! empty( $guest ) ) : ?>

            <p class="podcast-card__guest">

                Met <?php echo esc_html( $guest ); ?>

            </p>

        <?php endif; ?>

        <p class="podcast-card__meta">

            <?php if ( ! empty( $duration ) ) : ?>

                <span><?php echo esc_html( $duration ); ?></span>

                <span class="divider">•</span>

            <?php endif; ?>

            <?php if ( ! empty( $recorded ) ) : ?>

    <span>

        <?php echo esc_html( date_i18n( 'j F Y', strtotime( $recorded ) ) ); ?>

    </span>

<?php endif; ?>

        </p>

        <div class="podcast-card__excerpt">

            <?php echo wp_trim_words( get_the_excerpt(), 28 ); ?>

        </div>

        <div class="podcast-card__footer">

            <?php if ( ! empty( $spotify ) ) : ?>

                <a
                    href="<?php echo esc_url( $spotify ); ?>"
                    class="btn btn-primary"
                    target="_blank"
                    rel="noopener"
                >

                    Luister op Spotify

                </a>

            <?php endif; ?>

            <a
                href="<?php the_permalink(); ?>"
                class="podcast-read-more"
            >

                Lees meer →

            </a>

        </div>

    </div>

</article>