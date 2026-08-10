<?php
/**
 * Route Gallery
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$gallery = get_field( 'gallery' );

if ( empty( $gallery ) ) {
	return;
}
?>

<section class="route-gallery">

	<div class="container">

		<div class="route-gallery-header">

			<span class="route-section-label">
				Fotogalerij
			</span>

			<h2>Beleef de route alvast</h2>

			<p>
				Een selectie van foto's die tijdens deze route zijn gemaakt.
			</p>

		</div>

		<div class="route-gallery-grid">

			<?php foreach ( $gallery as $image ) : ?>

				<a
					href="<?php echo esc_url( $image['url'] ); ?>"
					class="gallery-item"
					target="_blank"
					rel="noopener">

					<img
						src="<?php echo esc_url( $image['sizes']['large'] ); ?>"
						alt="<?php echo esc_attr( $image['alt'] ); ?>">

				</a>

			<?php endforeach; ?>

		</div>

	</div>

</section>