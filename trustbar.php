<?php
/**
 * Hero Trust Bar
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

/*
|--------------------------------------------------------------------------
| Dynamische statistieken
|--------------------------------------------------------------------------
*/

$route_count = wp_count_posts( 'route' )->publish;

$podcast_count = post_type_exists( 'podcast' )
	? wp_count_posts( 'podcast' )->publish
	: 0;

$total_distance = function_exists( 'stoopendaal_total_distance' )
	? stoopendaal_total_distance()
	: 0;

$total_elevation = function_exists( 'stoopendaal_total_elevation' )
	? stoopendaal_total_elevation()
	: 0;

?>

<div class="hero-trust">

	<div class="container">

		<div class="hero-trust__grid">

			<div class="hero-trust__item">

				<span class="hero-trust__icon">
					<?php stoopendaal_icon( 'bike' ); ?>
				</span>

				<div>

					<strong><?php echo esc_html( $route_count ); ?></strong>

					<small>Routes online</small>

				</div>

			</div>

			<div class="hero-trust__item">

				<span class="hero-trust__icon">
					<?php stoopendaal_icon( 'distance' ); ?>
				</span>

				<div>

					<strong><?php echo esc_html( number_format( $total_distance, 0, ',', '.' ) ); ?> km</strong>

					<small>Totale afstand</small>

				</div>

			</div>

			<div class="hero-trust__item">

				<span class="hero-trust__icon">
					<?php stoopendaal_icon( 'elevation' ); ?>
				</span>

				<div>

					<strong><?php echo esc_html( number_format( $total_elevation, 0, ',', '.' ) ); ?> hm</strong>

					<small>Hoogtemeters</small>

				</div>

			</div>

			<div class="hero-trust__item">

				<span class="hero-trust__icon">
					<?php stoopendaal_icon( 'podcast' ); ?>
				</span>

				<div>

					<strong>
						<?php echo $podcast_count > 0 ? esc_html( $podcast_count ) : 'Nieuw'; ?>
					</strong>

					<small>Podcast</small>

				</div>

			</div>

		</div>

	</div>

</div>