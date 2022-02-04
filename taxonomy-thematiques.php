<?php
get_header();
$term = $wp_query->queried_object;
?>

    <div class="page-thematiques page-container" data-thematique="<?= $term->slug ?>">
        
        <!-- INTRO -->
        <section class="intro">
            <div class="container">
                <h1 class="page-title" data-reveal><span class="text-xl">Nos livres </span><br><?php single_term_title(); ?></h1>
                <div class="intro__description" data-reveal>
                    <?php the_archive_description(); ?>
                </div>
            </div>
        </section>

        <!-- LISTE LIVRES -->
        <section class="livres section-pad-top">
            <div class="container">
                

                <!-- Filtres -->
                <?php
                $args = [
                	"taxonomy" => "thematiques",
                	"parent" => $term->term_id,
                ];
                $sub_categories = get_terms($args);

                if ($sub_categories): ?>
                <div class="livres__filter">

                    <!-- Liste des filtres -->
                    <div class="livres__filter-container" :class="{active: menuFiltre}">

                        <!-- Bouton fermer -->
                        <button class="btn-close" @click="menuFiltre = false">close</button>

                        <!-- Liste des sous thématiques -->
                        <ul>
                            <?php foreach ($sub_categories as $sub_category):

                            	$name = $sub_category->name;
                            	$slug = $sub_category->slug;
                            	?>

                            <li class="livres__filter__item" @click="menuFiltre = false">
                                <label class="label" for="<?= $slug ?>"><?= $name ?>
                                    <input type="checkbox" id="<?= $slug ?>" name="<?= $slug ?>">
                                    <span class="checkmark"></span>
                                </label>
                            </li>

                            <?php
                            endforeach; ?>
                        </ul>    
                    </div>

                    <!-- Btn filtre mobile -->
                    <div class="btn-filtre" @click="menuFiltre = true">Filtres</div>

                    <!-- Filtres actifs mobile -->
                    <div class="filtres-actifs">
                        <?php foreach ($sub_categories as $sub_category):

                        	$name = $sub_category->name;
                        	$slug = $sub_category->slug;
                        	?>
                        <div class="filtres-actifs__item" data-filtre="<?= $slug ?>"><?= $name ?></div>
                        <?php
                        endforeach; ?>
                    </div>

                </div>
                <?php endif;
                ?>

                <!-- Livres -->
                <div class="livres__list-container">
                    <div class="livres__list<?php if (!$sub_categories) {
                    	echo " full-size";
                    } ?>" data-reveal>
                    
                        <?php
                        $args = [
                        	"post_type" => ["livre"],
                        	"paged" => $paged,
                        	"tax_query" => [
                        		[
                        			"taxonomy" => "thematiques",
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
