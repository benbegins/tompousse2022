<?php
/*
Template Name: Blog
*/
get_header(); ?>

<div class="page-blog page-container">

    <!-- INTRO -->
    <section class="intro">
        <div class="container text-center">
            <h1 class="page-title" data-reveal>Blog</h1>
        </div>
    </section>

    <!-- ARTICLES -->
    <main class="articles section-pad-top">
        <div class="container">
            
            <!-- Liste catégories -->
            <div class="articles__categories">
                <nav aria-label="catégories d'articles" class="articles__categories__list" :class="{active: menuFiltre}">
                    <!-- Bouton fermer -->
                    <button class="btn-close" @click="menuFiltre = false">close</button>
                    <!-- Liste -->
                    <ul>
                        <?php
                        $args = [
                        	"title_li" => "",
                        	"show_count" => true,
                        ];
                        wp_list_categories($args);
                        ?>
                    </ul>
                </nav>
                <!-- Btn filtre mobile -->
                <div class="btn-categories" @click="menuFiltre = true">Categories</div>
            </div>

            <!-- Liste articles -->
            <div class="articles__list" data-reveal>
                <ul>

                <?php
                $args = [
                	"post_type" => "post",
                	"paged" => $paged,
                ];
                $articles = new WP_Query($args);
                if ($articles->have_posts()) {
                	while ($articles->have_posts()) {
                		$articles->the_post(); ?>
                        <li>
                            <?php get_template_part(
                            	"./template-parts/article-card"
                            ); ?>
                        </li>
                            
                        <?php
                	}
                }
                ?>
                
                </ul>
                
                <!-- Pagination -->
                <div class="pagination">
                    <?php
                    $big = 999999999;
                    echo paginate_links([
                    	"base" => str_replace(
                    		$big,
                    		"%#%",
                    		esc_url(get_pagenum_link($big))
                    	),
                    	"format" => "?paged=%#%",
                    	"current" => max(1, get_query_var("paged")),
                    	"total" => $articles->max_num_pages,
                    	"show_all" => false,
                    	"prev_next" => true,
                    ]);
                    ?>  
                </div>
                
            </div>
        </div>
    </main>

</div>

<?php get_footer(); ?>
