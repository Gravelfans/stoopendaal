<?php
/**
 * Favorite Routes
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$query = new WP_Query( array(
    'post_type'      => 'route',
    'posts_per_page' => 3,
    'post_status'    => 'publish',
) );

if ( ! $query->have_posts() ) {
    return;
}
?>

<section class="about-favorites">

    <div class="container">

        <div class="about-favorites-header">

            <span class="about-section-label">
                Mijn favorieten
            </span>

            <h2>
                Drie routes die je echt gereden moet hebben
            </h2>

            <p>
                Als je mij vraagt waar je moet beginnen, dan zijn dit mijn persoonlijke favorieten.
            </p>

        </div>

        <div class="about-favorites-grid">

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                <article class="favorite-card">

                    <a href="<?php the_permalink(); ?>" class="favorite-image">

                        <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'large' );
                        }
                        ?>

                    </a>

                    <div class="favorite-content">

                        <h3><?php the_title(); ?></h3>

                        <p>

                            <?php echo wp_trim_words( get_the_excerpt(), 18 ); ?>

                        </p>

                        <a href="<?php the_permalink(); ?>" class="favorite-button">

                            Bekijk route →

                        </a>

                    </div>

                </article>

            <?php endwhile; ?>

        </div>

    </div>

</section>

<?php wp_reset_postdata(); ?>