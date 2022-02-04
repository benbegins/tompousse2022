<?php get_header(); ?>

    <div class="page-search page-container">

        <!-- INTRO -->
        <?php
        // Requete livres
        $args = [
        	"post_type" => "livre",
        	"s" => get_search_query(),
        	"posts_per_page" => -1,
        ];
        $livres = new WP_Query($args);
        $nombre_livres = $livres->found_posts;

        // Requete articles
        $args = [
        	"post_type" => "post",
        	"s" => get_search_query(),
        	"posts_per_page" => -1,
        ];
        $articles = new WP_Query($args);
        $nombre_articles = $articles->found_posts;

        // Auteurs
        $args = [
        	"taxonomy" => ["auteurs"],
        	"hide_empty" => true,
        	"fields" => "all",
        	"name__like" => get_search_query(),
        ];
        $auteurs = get_terms($args);
        $nombre_auteurs = count($auteurs);

        $total_results = $nombre_livres + $nombre_articles + $nombre_auteurs;
        ?>

        <section class="intro">
            <div class="container">
                <h1 class="intro__title" data-reveal><?php the_search_query(); ?></h1>
                
                <p class="intro__resultats">
                    <?php if ($total_results > 1) {
                    	echo $total_results . " résultats";
                    } elseif ($total_results === 1) {
                    	echo $total_results . " résultat";
                    } else {
                    	echo "Aucun résultat";
                    	get_template_part("./template-parts/form-search");
                    } ?>
                </p>
            </div>
        </section>


        <!-- LIVRES -->
        <?php
        if ($livres->have_posts()): ?>

        <section class="livres section-pad-top">
            <div class="container">
                <h2 class="section-title search-section-title">Livres<span><?= $nombre_livres ?></span></h2>
                <div class="livres__list">
                    <?php while ($livres->have_posts()) {
                    	$livres->the_post();
                    	get_template_part("./template-parts/livre-card");
                    } ?>
                </div>
            </div>
        </section>

        <?php endif;
        wp_reset_postdata();
        ?>


        <!-- AUTEURS -->
        <?php
        if ($nombre_auteurs > 0): ?>

        <section class="auteurs section-pad-top">
            <div class="container">
                <h2 class="section-title search-section-title">Auteur.e.s<span><?= $nombre_auteurs ?></span></h2>
                <div class="auteurs__list">
                    <?php foreach ($auteurs as $auteur):

                    	$prenom = get_field(
                    		"prenom",
                    		"auteurs_" . $auteur->term_id
                    	);
                    	$nom = $auteur->name;
                    	?>
                        <a class="link-arrow mr-4" href="<?= get_term_link(
                        	$auteur->slug,
                        	"auteurs"
                        ) ?>"><?= $prenom . " " . $nom ?></a>
                        <?php
                    endforeach; ?>	 
                </div>
            </div>
        </section>

        <?php endif;
        wp_reset_postdata();
        ?>



        <!-- ARTICLES -->
        <?php
        if ($articles->have_posts()): ?>

        <section class="articles section-pad-top">
            <div class="container">
                <h2 class="section-title search-section-title">Articles<span><?= $nombre_articles ?></span></h2>
                <div class="articles__list">
                    <?php while ($articles->have_posts()) {
                    	$articles->the_post();
                    	get_template_part("./template-parts/article-card");
                    } ?>
                </div>
            </div>
        </section>

        <?php endif;
        wp_reset_postdata();
        ?>


        <!-- RECHERCHE -->
        <?php if ($total_results > 1): ?>
        <section class="recherche section-pad-top">
            <div class="container">
                <h2 class="section-title mb-8">Nouvelle recherche</h2>
                <?php get_template_part("./template-parts/form-search"); ?>
            </div>
        </section>
        <?php endif; ?>


        <!-- NOUVEAUTES si aucun résultat -->
        <?php if ($total_results === 0): ?>
        <section class="nouveautes section-pad-top">
            <?php
            // Récupère le lien de la thématique Nouveautés
            $thematiques = get_terms("thematiques");
            $nouveautes_link = "";
            foreach ($thematiques as $thematique) {
            	if ($thematique->slug === "nouveautes") {
            		$nouveautes_link = get_term_link($thematique);
            	}
            }
            ?>    
            
            <div class="container lg:flex lg:items-center lg:justify-between">
                <h2 class="section-title">Les nouveautés</h2>
                <div class="hidden lg:block">
                    <a href="<?= $nouveautes_link ?>" class="btn-secondary">Toutes nos nouveautés</a>    
                </div>
            </div>

            <div class="slider-livres__wrapper mt-8">
                <!-- Slider -->
                <div class="swiper slider-livres">
                    <div class="swiper-wrapper">
                        
                        <?php
                        $args = [
                        	"post_type" => ["livre"],
                        	"posts_per_page" => "6",
                        	"tax_query" => [
                        		[
                        			"taxonomy" => "thematiques",
                        			"field" => "slug",
                        			"terms" => "nouveautes",
                        		],
                        	],
                        ];

                        $nouveautes = new WP_Query($args);

                        if ($nouveautes->have_posts()):
                        	while ($nouveautes->have_posts()):
                        		$nouveautes->the_post(); ?>

                        <div class="swiper-slide">
                                <?php get_template_part(
                                	"/template-parts/livre-card"
                                ); ?>
                        </div>

                        <?php
                        	endwhile;
                        endif;

                        wp_reset_postdata();
                        ?>

                    </div>
                    <div class="swiper-button-prev slider-btn btn-prev"></div>
                    <div class="swiper-button-next slider-btn btn-next"></div>
                </div>
            </div>

            <div class="container text-center mt-8 lg:hidden">
                <a href="<?= $nouveautes_link ?>" class="btn-secondary">Toutes nos nouveautés</a>    
            </div>
        </section>
        <?php endif; ?>

    </div>

<?php get_footer(); ?>
