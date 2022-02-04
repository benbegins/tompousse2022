<?php
get_header(); ?>

<div class="page-blog page-container">

    <!-- INTRO -->
    <section class="intro">
        <div class="container text-center">
            <h1 class="page-title" data-reveal><?php single_term_title(); ?></h1>
        </div>
    </section>

    <!-- ARTICLES -->
    <main class="articles section-pad-top">
        <div class="container">
            
            <!-- Liste catégories -->
            <div class="articles__categories" >
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

                <?php if (have_posts()) {
                	while (have_posts()) {
                		the_post(); ?>
                        <li>
                            <?php get_template_part(
                            	"./template-parts/article-card"
                            ); ?>
                        </li>   
                <?php
                	}
                } ?>
                
                </ul>
                
                <!-- Pagination -->
                <div>
                    <?php
                    $args = [
                    	"class" => "pagination",
                    	"show_all" => "true",
                    	"screen_reader_text" => "Navigation des articles",
                    ];
                    the_posts_pagination($args);
                    ?>
                </div>
                
            </div>
        </div>
    </main>

</div>

<?php get_footer(); ?>
