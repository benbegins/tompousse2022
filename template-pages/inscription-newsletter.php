<?php
/*
Template Name: Inscription Newsletter
*/
get_header(); ?>

    <div class="page-inscription-newsletter page-container">

        <section class="section-pad">
            <div class="container">
                <h1 class="page-title" data-reveal><?php the_title() ?></h1>
                <p>Merci, votre inscription a bien été prise en compte.</p>
                <a href="<?= get_site_url() ?>" class="btn-primary">Retour à l'accueil</a>
            </div>
        </section>
        
    </div>

<?php get_footer(); ?>
