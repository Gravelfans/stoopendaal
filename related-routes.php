<?php
/**
 * Related Routes
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$current_id = get_the_ID();

$query = new WP_Query( array(
	'post_type'      => 'route',
	'posts_per_page' => 3,
	'post__not_in'   => array( $current_id ),
	'post_status'    => 'publish',
) );

if ( ! $query->have_posts() ) {
	return;
}
?>

<section class="route-related">

	<div class="container">

		<div class="route-related-header">

			<span class="route-section-label">
				Meer routes
			</span>

			<h2>Misschien vind je deze routes ook leuk</h2>

		</div>

		<div class="route-related-grid">

			<?php while ( $query->have_posts() ) : $query->the_post();

				$distance  = get_field( 'distance' );
				$elevation = get_field( 'hoogtemeters' );
				$difficulty = get_field( 'difficulty' );
			?>

			<article class="related-card">

				<a href="<?php the_permalink(); ?>" class="related-image">

					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'large' );
					}
					?>

				</a>

				<div class="related-content">

					<h3>

						<a href="<?php the_permalink(); ?>">

							<?php the_title(); ?>

						</a>

					</h3>

					<div class="related-meta">

						<?php if ( $distance ) : ?>
							<span>📏 <?php echo esc_html( $distance ); ?> km</span>
						<?php endif; ?>

						<?php if ( $elevation ) : ?>
							<span>⛰ <?php echo esc_html( $elevation ); ?> hm</span>
						<?php endif; ?>

						<?php if ( $difficulty ) : ?>
							<span>⭐ <?php echo esc_html( ucfirst( $difficulty ) ); ?></span>
						<?php endif; ?>

					</div>

					<a class="related-button" href="<?php the_permalink(); ?>">

						Bekijk route →

					</a>

				</div>

			</article>

			<?php endwhile; ?>

		</div>

	</div>

</section>

<?php wp_reset_postdata(); ?>