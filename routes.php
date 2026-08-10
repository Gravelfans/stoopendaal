<?php
/**
 * Homepage Route Explorer
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$route_query = new WP_Query(
	array(
		'post_type'      => 'route',
		'posts_per_page' => 3,
		'post_status'    => 'publish',
	)
);

if ( $route_query->have_posts() ) :
?>

<section class="home-routes">

    <div class="container">

        <?php
get_template_part(
    'template-parts/components/section-heading',
    null,
    array(
        'label' => 'Nieuwste routes',
        'title' => 'Ontdek jouw volgende gravelavontuur',
        'text'  => 'Zelf gereden gravelroutes inclusief GPX-download, foto\'s, hoogteprofiel en praktische informatie.',
    )
);
?>

        <div class="routes-grid">

        <?php
        while ( $route_query->have_posts() ) :

            $route_query->the_post();

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
?>

        <?php endwhile; ?>

        </div>

        <div class="routes-footer">

            <a href="<?php echo esc_url( get_post_type_archive_link( 'route' ) ); ?>" class="all-routes-button">

                Bekijk alle routes →

            </a>

        </div>

    </div>

</section>

<?php

wp_reset_postdata();

endif;