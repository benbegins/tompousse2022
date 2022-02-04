<?php get_header(); ?>

    <div class="page-single-article page-container">

        <!-- INTRO -->
        <section class="intro">
            <div class="container" data-reveal>
                <h1 class="section-title"><?php the_title(); ?></h1>
                <div class="mt-4">
                    <?php
                    $args = [
                    	"parent" => 0,
                    ];
                    $categories = wp_get_object_terms(
                    	$post->ID,
                    	"category",
                    	$args
                    );
                    foreach ($categories as $category):

                    	$name = $category->name;
                    	$link = get_term_link($category->term_id);
                    	?>

                    <a href="<?= $link ?>" class="link-arrow"><?= $name ?></a>

                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </section>

        <!-- MAIN CONTENT -->
        <main class="main-content rich-text" ref="richText">
            <div class="container" data-reveal>
                <div class="content">
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail("medium_large"); ?>
                    </div>
                    <?php the_content(); ?>
                </div>
            </div>
        </main>

        <!-- A LIRE AUSSI -->
        <section class="related-articles section-pad-top">
            <div class="container lg:flex lg:items-center lg:justify-between">
                <h2 class="section-title">À lire aussi</h2>
                <div class="hidden lg:block">
                    <a href="<?= get_site_url() ?>/blog" class="btn-secondary">Voir le blog</a>    
                </div>
            </div>
            <div class="related-articles__list container">
                <?php
                // On affiche en priorité les article de la même catégorie
                $args = [
                	"post_type" => ["post"],
                	"posts_per_page" => "3",
                	"post__not_in" => [$post->ID],
                	"tax_query" => [
                		[
                			"taxonomy" => "category",
                			"field" => "slug",
                			"terms" => $categories[0]->slug,
                		],
                	],
                ];

                $query = new WP_Query($args);
                // Calcul s'il y a moins de 3 articles complémentaires
                $remaining_posts = 3 - $query->found_posts;
                // Regroupe les IDs des produits affichés sur la page
                $post_affichees = [$post->ID];

                if ($query->have_posts()):
                	while ($query->have_posts()):
                		$query->the_post();
                		get_template_part("template-parts/article-card");
                		array_push($post_affichees, $post->ID);
                	endwhile;
                endif;

                wp_reset_postdata();

                // S'il n'y a pas 3 articles à afficher,
                // on affiche des produits toutes catégories confondues
                if ($remaining_posts > 0) {
                	$args = [
                		"post_type" => ["post"],
                		"posts_per_page" => $remaining_posts,
                		"post__not_in" => $post_affichees,
                	];

                	$query = new WP_Query($args);

                	if ($query->have_posts()):
                		while ($query->have_posts()):
                			$query->the_post();
                			get_template_part("template-parts/article-card");
                		endwhile;
                	endif;
                }

                wp_reset_postdata();
                ?>         
            </div>
            <div class="container text-center mt-8 lg:hidden">
                <a href="<?= get_site_url() ?>/blog" class="btn-secondary">Voir le blog</a>    
            </div>
        </section>


    </div>

<?php get_footer(); ?>
