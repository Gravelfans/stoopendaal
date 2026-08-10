<section class="hero-v2">

    <div class="hero-v2__background">

        <div class="hero-v2__overlay">

            <div class="container">

                <div class="hero-v2__content">

                    <span class="hero-v2__label">
                        STOOPENDAAL GRAVELROADS
                    </span>

                    <h1>
                        Ontdek de mooiste gravelroutes van
                        <span>Nederland</span>
                    </h1>

                    <p>
                        Meer dan <strong>300 zelf gereden gravelroutes</strong>,
                        inclusief gratis GPX-downloads, foto's,
                        hoogteprofielen en praktische informatie.
                    </p>

                    <div class="hero-v2__buttons">

                        <?php
                        get_template_part(
                            'template-parts/components/button',
                            null,
                            array(
                                'label' => 'Ontdek routes',
                                'url'   => '#routes',
                                'style' => 'primary',
                                'icon'  => true,
                            )
                        );

                        get_template_part(
                            'template-parts/components/button',
                            null,
                            array(
                                'label' => 'Bekijk kaart',
                                'url'   => '#kaart',
                                'style' => 'secondary',
                                'icon'  => false,
                            )
                        );
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <div class="hero-trust">

        <div class="container">

            <div class="hero-trust__grid">

                <div class="hero-trust__item">

                    <div class="hero-trust__icon">
                        <?php if ( function_exists( 'stoopendaal_icon' ) ) stoopendaal_icon( 'route' ); ?>
                    </div>

                    <div>
                        <strong>300+</strong>
                        <small>Zelf gereden routes</small>
                    </div>

                </div>

                <div class="hero-trust__item">

                    <div class="hero-trust__icon">
                        <?php if ( function_exists( 'stoopendaal_icon' ) ) stoopendaal_icon( 'download' ); ?>
                    </div>

                    <div>
                        <strong>Gratis</strong>
                        <small>GPX-downloads</small>
                    </div>

                </div>

                <div class="hero-trust__item">

                    <div class="hero-trust__icon">
                        <?php if ( function_exists( 'stoopendaal_icon' ) ) stoopendaal_icon( 'podcast' ); ?>
                    </div>

                    <div>
                        <strong>Podcast</strong>
                        <small>Reviews & verhalen</small>
                    </div>

                </div>

                <div class="hero-trust__item">

                    <div class="hero-trust__icon">
                        <?php if ( function_exists( 'stoopendaal_icon' ) ) stoopendaal_icon( 'map' ); ?>
                    </div>

                    <div>
                        <strong>12</strong>
                        <small>Provincies</small>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>