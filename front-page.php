<?php get_header(); ?>

    <div class="home page-container no-bulles">
        
        <!-- HERO -->
        <section class="hero">
            <div class="hero__container">
                <div class="left">
                    <h1 class="page-title" data-reveal><span class="text-xl">Maison d'édition</span><br>Spécialiste des troubles des apprentissages, de la cognition et des troubles Dys</h1>
                    <div data-reveal><?php get_template_part(
                    	"./template-parts/form-search"
                    ); ?></div>
                </div>
                <div class="right" data-reveal>
                    <img src="<?= get_template_directory_uri() ?>/src/img/home-hero.jpg" alt="Livres Éditions Tom Pousse">
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

            <div class="container text-center mt-8 lg:hidden">
                <a href="<?= $nouveautes_link ?>" class="btn-secondary">Toutes nos nouveautés</a>    
            </div>

            <div class="container text-center mt-16">
                <h2 class="section-title">Restez informés</h2>
                <p>Recevez toutes les nouveautés et bien plus dans votre boite mail.</p>
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
                    <p>Guides pratiques, méthodes pédagogiques éprouvées, ou encore témoignages poignants et formateurs, à destination des enseignants ou des parents, découvrez les 7 collections Tom Pousse.</p>
                    <a href="<?= get_site_url() ?>/collections" class="btn-secondary mt-6">Voir les collections</a>
                </div>
            </div>
        </section>


        <!-- BLOG -->
        <section class="blog">
            <div class="container lg:flex lg:items-center lg:justify-between">
                <h2 class="section-title">Les derniers articles</h2>
                <div class="hidden lg:block">
                    <a href="" class="btn-secondary">Voir le blog</a>    
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
        </section>



    </div>

<?php get_footer(); ?>
