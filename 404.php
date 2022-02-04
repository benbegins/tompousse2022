<?php
get_header(); ?>

    <div class="page-404 page-container">

        <!-- INTRO -->
        <section class="intro intro-padding text-center">
            <div class="container">
                <h1 class="intro__title page-title" data-reveal>Nous sommes désolés, la page que vous recherchez n’existe pas.</h1>
            </div>
        </section>    
        
        <section>
            <div class="container">
                <div class="content">
                    <div class="img-container">
                        <img src="https://media4.giphy.com/media/l0HlOBZcl7sbV6LnO/giphy.gif?cid=790b76118f2cccab0d7fe4ec7897c8a92fcb4012b937c066&rid=giphy.gif&ct=g" alt="">
                    </div>
                    <a href="<?= get_site_url() ?>" class="btn-primary">Retour à l'accueil</a>
                </div>
            </div>
        </section>
            

    </div>

<?php get_footer(); ?>
