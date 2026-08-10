<?php
/**
 * Route Content
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="route-content">

    <div class="container">

        <div class="route-layout">

            <main class="route-main">

                <?php
                get_template_part(
                    'template-parts/routes/description'
                );
                ?>

                <?php
                get_template_part(
                    'template-parts/routes/gallery'
                );
                ?>

                <?php
                get_template_part(
                    'template-parts/routes/map'
                );
                ?>

                <?php
                get_template_part(
                    'template-parts/routes/downloads'
                );
                ?>

                <?php
                get_template_part(
                    'template-parts/routes/practical-info'
                );
                ?>

            </main>

            <aside class="route-sidebar">

                <?php
                get_template_part(
                    'template-parts/routes/stats'
                );
                ?>

            </aside>

        </div>

    </div>

</section>

<?php
get_template_part(
    'template-parts/routes/related-routes'
);
?>