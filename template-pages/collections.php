<?php
/*
Template Name: Collections
*/
get_header(); ?>

    <div class="page-collections page-container">

        <!-- INTRO -->
        <section class="intro">
            <div class="container">
                <h1 class="intro__title page-title" data-reveal>Collections</h1>
                <div class="intro__description" data-reveal><?php the_content(); ?></div>
            </div>
        </section>

        <!-- LISTE COLLECTIONS -->
        <?php
        $args = [
        	"taxonomy" => "collections",
        	"parent" => 0,
        ];
        $collections = get_terms($args);

        if (!$collections->errors):
        	foreach ($collections as $collection):

        		$name = $collection->name;
        		$link = get_term_link($collection->term_id);
        		$description = $collection->description;
        		?>
        <section class="collection section-pad-top">
                <div class="container">
                    <div class="collection__content">
                        <h2 class="collection__title section-title"><?= $name ?></h2>
                        <p class="collection__description"><?= $description ?></p>
                        <div class="collection__link">
                            <a href="<?= $link ?>" class="btn-secondary">Découvrir cette collection</a>
                        </div>    
                    </div>
                </div>
                <!-- Slider -->
                <div class="swiper slider-livres">
                    <div class="swiper-wrapper">
                        
                        <?php
                        $args = [
                        	"post_type" => ["livre"],
                        	"posts_per_page" => "6",
                        	"tax_query" => [
                        		[
                        			"taxonomy" => "collections",
                        			"field" => "slug",
                        			"terms" => $collection->slug,
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
        </section>
        <?php
        	endforeach;
        endif;
        ?>

    </div>

<?php get_footer(); ?>
