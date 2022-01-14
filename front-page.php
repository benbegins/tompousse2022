<?php get_header(); ?>

    <div class="home page-container">
        
        <section class="hero">
            <div class="hero__container">
                <div class="left">
                    <h1 class="page-title"><span class="text-xl">Maison d'édition</span><br>Spécialiste des <span class="underline">troubles des apprentissages</span>, de la <span class="underline">cognition</span> et des <span class="underline">troubles Dys</span></h1>
                    <form action="/" method="get">
                        <input type="text" placeholder="Titre, collection, auteur(e)…" name="s" id="search" value="<?php the_search_query(); ?>" />
                        <input type="submit" value="Rechercher">
                    </form>
                </div>
                <div class="right">
                    <img src="<?= get_template_directory_uri(); ?>/src/img/home-hero.jpg" alt="Livres Éditions Tom Pousse">
                </div>
            </div>
        </section>

        <section class="min-h-screen"></section>

    </div>

<?php get_footer(); ?>