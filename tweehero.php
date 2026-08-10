<?php
/**
 * About Hero
 *
 * @package Stoopendaal
 */

defined( 'ABSPATH' ) || exit;

$image = get_template_directory_uri() . '/assets/images/about-arjan.jpg';
?>

<section class="about-hero">

    <div class="about-hero__image"
         style="background-image:url('<?php echo esc_url( $image ); ?>');">

        <div class="about-hero__overlay">

            <div class="container">

                <span class="about-label">
                    Het verhaal achter STOOPENDAAL
                </span>

                <h1 class="about-title">

                    Ik ben Arjan Stoopendaal

                </h1>

                <p class="about-intro">

                    Ik geloof dat de mooiste gravelroutes niet gevonden worden,
                    maar zelf ontdekt. Elke route op STOOPENDAAL is zelf gereden,
                    gecontroleerd en gemaakt om anderen te inspireren.

                </p>

                <div class="about-buttons">

                    <a href="/routes/" class="button-primary">

                        Bekijk routes

                    </a>

                    <a href="/podcast/" class="button-secondary">

                        Luister podcast

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>