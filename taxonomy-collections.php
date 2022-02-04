<?php
get_header();
$term = $wp_query->queried_object;
?>

    <div class="page-collections page-container">
        
        <!-- INTRO -->
        <section class="intro">
            <div class="container">
                <h1 class="intro__title page-title" data-reveal><?php single_term_title(); ?></h1>
                <div class="intro__description" data-reveal>
                    <?php the_archive_description(); ?>
                </div>
            </div>
        </section>

        <!-- LISTE LIVRES -->
        <section class="livres section-pad-top">
            <div class="container">

                <!-- Livres -->
                <div class="livres__list-container">
                    <div class="livres__list" data-reveal>
                    
                        <?php
                        $args = [
                        	"post_type" => ["livre"],
                        	"paged" => $paged,
                        	"tax_query" => [
                        		[
                        			"taxonomy" => "collections",
                        			"field" => "slug",
                        			"terms" => $term->slug,
                        		],
                        	],
                        ];
                        $query = new WP_Query($args);
                        if ($query->have_posts()) {
                        	while ($query->have_posts()) {
                        		$query->the_post();
                        		get_template_part(
                        			"./template-parts/livre-card"
                        		);
                        	}
                        } else {
                        	echo "Pas de livres à afficher dans cette thématique";
                        }
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div>
                        <?php
                        $args = [
                        	"class" => "pagination",
                        	"show_all" => "true",
                        	"screen_reader_text" => "Navigation des livres",
                        ];
                        the_posts_pagination($args);
                        ?>
                    </div>

                </div>

            </div>
        </section>

    </div>

<?php get_footer(); ?>
