<?php get_header(); ?>

    <div class="home page-container">
        
        <!-- HERO -->
        <section class="hero">
            <div class="container">
                <div class="text-wrapper">
                    <div class="text-content">
                        <h1 class="page-title" data-reveal>
                            <div class="page-title__main">Maison d'édition</div>
                            <div class="page-title__sub">Pour accompagner les enfants et les adultes en difficulté d’apprentissage et/ou en situation de handicap</div>
                        </h1>
                        <div data-reveal><?php get_template_part(
                        	"./template-parts/form-search"
                        ); ?></div>
                    </div>
                </div>
                <div class="hero__images">
                    <div class="image left"></div>
                    <div class="image right"></div>
                </div>
            </div>
        </section>
        

        <!-- NOUVEAUTES -->
        <section class="nouveautes section-pad">
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

                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                        	while ($query->have_posts()):
                        		$query->the_post(); ?>

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

            <div class="container text-left md:text-center mt-8 lg:hidden">
                <a href="<?= $nouveautes_link ?>" class="btn-secondary">Toutes nos nouveautés</a>    
            </div>

            <div class="container text-left md:text-center mt-16">
                <h2 class="section-title">Restez informés</h2>
                <p>Tenez-vous au courant de la sortie nos prochaines publications.</p>
                <?php get_template_part("./template-parts/newsletter"); ?>
            </div>
                
        </section>


        <!-- THEMATIQUES -->
        <section class="thematiques">
            <div class="container">
                <h2 class="section-title">Nos livres par thématiques</h2>
                <ul class="thematiques__list">
                    <?php
                    $args = [
                    	"taxonomy" => "thematiques",
                    	"parent" => 0,
                    ];
                    $thematiques = get_terms($args);
                    foreach ($thematiques as $thematique):
                    	$name = $thematique->name;
                    	$count = $thematique->count;
                    	$link = get_term_link($thematique->term_id);

                    	echo '<li><a class="link-arrow" href="' .
                    		$link .
                    		'">' .
                    		$name .
                    		"</a></li>";
                    endforeach;
                    ?>
                </ul>
            </div>
        </section>


        <!-- COLLECTIONS -->
        <section class="collections section-pad">
            <div class="container">
                <div class="left">
                    <?php
                    $image_collections = get_field("image_collections");

                    if ($image_collections) {
                    	echo wp_get_attachment_image(
                    		$image_collections["id"],
                    		"large"
                    	);
                    }
                    ?>
                </div>
                <div class="right">
                    <h2 class="section-title">Nos collections</h2>
                    <p>Guides pratiques, méthodes pédagogiques éprouvées, ou encore témoignages poignants et formateurs, découvrez les collections Tom Pousse destinés aux aidants et aux professionnels.</p>
                    <a href="<?= get_site_url() ?>/collections" class="btn-secondary mt-6">Voir les collections</a>
                </div>
            </div>
        </section>


        <!-- BLOG -->
        <section class="blog">
            <div class="container lg:flex lg:items-center lg:justify-between">
                <h2 class="section-title">Les derniers articles</h2>
                <div class="hidden lg:block">
                    <a href="<?= get_site_url() ?>/blog" class="btn-secondary">Voir le blog</a>    
                </div>
            </div>
            <div class="slider-articles mt-8 swiper">
                <ul class="articles__list swiper-wrapper">
                    <?php
                    $args = [
                    	"post_type" => ["post"],
                    	"posts_per_page" => "3",
                    ];

                    $query = new WP_Query($args);

                    if ($query->have_posts()):
                    	while ($query->have_posts()):
                    		$query->the_post(); ?>

                    <li class="articles__item swiper-slide">
                            <?php get_template_part(
                            	"/template-parts/article-card"
                            ); ?>
                    </li>

                    <?php
                    	endwhile;
                    endif;

                    wp_reset_postdata();
                    ?>
                </ul>
            </div>
            <div class="container text-left md:text-center mt-8 lg:hidden">
                <a href="<?= get_site_url() ?>/blog" class="btn-secondary">Voir le blog</a>    
            </div>
        </section>



    </div>

<?php get_footer(); ?>
