<?php
/**
 * Front Page
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<main id="primary" class="site-main">

    <?php get_template_part( 'template-parts/hero' ); ?>

    <?php get_template_part( 'template-parts/stats' ); ?>

    <?php get_template_part( 'template-parts/routes' ); ?>

    <?php get_template_part( 'template-parts/reviews' ); ?>

    <?php get_template_part( 'template-parts/usp' ); ?>

    <?php get_template_part( 'template-parts/cta' ); ?>

    <?php get_template_part( 'template-parts/contact' ); ?>

</main>

<?php
get_footer();