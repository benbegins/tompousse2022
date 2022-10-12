<?php
/*
Template Name: Contact
*/
get_header(); ?>

    <div class="page-contact page-container">

        <!-- INTRO -->
        <section class="intro intro-padding text-center">
            <div class="container">
                <h1 class="intro__title page-title" data-reveal>Contact</h1>
            </div>
        </section>

        <main class="main-section section-pad-top">
            <div class="container">
                <div class="left">
                    <div class="adress">
                        <h2 class="section-title">Adresse</h2>
                        <p>
                            33 boulevard Arago<br>
                            75013 PARIS<br>
                            01 44 49 75 00
                        </p>
                    </div>
                    <div class="map">
                        <div class="img-container">
                            <a href="https://www.google.fr/maps/place/Editions+Tom+Pousse/@48.8352829,2.3474372,19z/data=!3m1!4b1!4m5!3m4!1s0x47e67194a5e50431:0x6c562e07f1227495!8m2!3d48.8352935!4d2.3480179" target="_blank"><img src="<?= get_template_directory_uri() ?>/src/img/map-contact.png" alt="plan"></a>
                        </div>
                    </div>
                    <div>
                        <p><strong>Nous faire parvenir un manuscrit</strong></p>
                        <p>Vous pouvez envoyer votre projet ou manuscrit à l’adresse suivante : edito[at]tompousse.fr. Pour tout autre demande, merci d’utiliser le formulaire de contact.</p>
                    </div>
                </div>
                <div class="right">
                    <?php
                    $formulaire = get_field("formulaire");
                    echo do_shortcode($formulaire);
                    ?>
                </div>
            </div>
        </main>

        
            

    </div>

<?php get_footer(); ?>
