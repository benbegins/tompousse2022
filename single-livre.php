<?php
get_header();

$couverture = get_field("couverture");
$size = "medium";
$couleur = get_field("couleur_principale");
?>

    <div class="single-livre page-container no-bulles">
        
        <main class="main">
            <div class="container">
                <!-- Couv + Liens -->
                <div class="left">
                    <div class="couverture">
                        <?= wp_get_attachment_image(
                        	$couverture["id"],
                        	$size
                        ) ?>    
                        <div class="background" style="background-color:<?= $couleur ?>"></div>
                    </div>
                    <div class="links">
                        <!-- Feuilleteur -->
                        <?php if (get_field("feuilleteur")): ?>
                        <a href="<?php the_field(
                        	"feuilleteur"
                        ); ?>" class="links__item extrait" target="_blank" style="background-color:<?= $couleur ?>">Feuilleter un extrait</a>
                        <?php endif; ?>
                        <!-- Compléments -->
                        <?php if (get_field("complements")): ?>
                        <a href="<?php the_field(
                        	"complements"
                        ); ?>" class="links__item complements" target="_blank" style="background-color:<?= $couleur ?>">Voir les compléments</a>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Description -->
                <div class="right" data-reveal>
                    <div data-reveal>
                        <h1 class="titre-livre"><?php the_title(); ?></h1>
                        <div class="auteurs">
                            <?php
                            $auteurs = get_the_terms($post->ID, "auteurs");
                            foreach ($auteurs as $auteur):

                            	$prenom = get_field(
                            		"prenom",
                            		"auteurs_" . $auteur->term_id
                            	);
                            	$nom = $auteur->name;
                            	?>
                            <a class="link-arrow mr-12" href="<?= get_term_link(
                            	$auteur->slug,
                            	"auteurs"
                            ) ?>"><?= $prenom . " " . $nom ?></a>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                    <div class="prix-commander">
                        <p class="prix"><?php the_field("prix"); ?> €</p>
                        <button class="btn-primary commander" @click="commanderModal = true">Commander</button>
                    </div>
                    <div class="description">
                        <?php the_field("description_du_livre"); ?>
                    </div>
                </div>
            </div>
        </main>

        <!-- MODAL COMMANDER -->
        <?php get_template_part("./template-parts/commander"); ?>

        <!-- INFOS -->
        <section class="infos section-pad-top">
            <div class="container">
                <?php
                $article = get_field("article_de_blog");
                $image = get_the_post_thumbnail($article->ID, "medium");
                $link = get_post_permalink($article->ID);

                if ($article): ?>
                <!-- BLOG -->
                <div class="article-blog">
                    <div class="onenparle">
                        <h2 class="section-title">On en parle sur <br>le blog.</h2>
                    </div>
                    <div class="article-blog__img-container">
                        <a href="<?= $link ?>">
                            <?= $image ?>
                        </a>
                    </div>
                    <div class="article-blog__content">
                        <h3 class="article-title"><?= $article->post_title ?></h3>
                        <a href="<?= $link ?>" class="link-basic">Lire l'article</a>
                    </div>
                </div>
                <?php endif;
                ?>

                <div class="infos__section">
                    <!-- Auteurs -->
                    <div class="infos__item">
                        <h2 class="infos__item__title">Auteur.e.s</h2>
                        <?php // $auteurs = get_the_terms( $post->ID , 'auteurs' );

foreach ($auteurs as $auteur):

                        	$prenom = get_field(
                        		"prenom",
                        		"auteurs_" . $auteur->term_id
                        	);
                        	$nom = $auteur->name;
                        	?>
                        <a class="infos__item__link link-arrow" href="<?= get_term_link(
                        	$auteur->slug,
                        	"auteurs"
                        ) ?>"><?= $prenom . " " . $nom ?></a>
                        <?php
                        endforeach; ?>	
                    </div>

                    <!-- thématiques -->
                    <div class="infos__item">
                        <h2 class="infos__item__title">Thématique.s</h2>
                        <?php
                        $thematiques = get_the_terms($post->ID, "thematiques");
                        foreach ($thematiques as $thematique):

                        	$name = $thematique->name;
                        	$link = get_term_link(
                        		$thematique->slug,
                        		"thematiques"
                        	);
                        	?>
                        <a href="<?= $link ?>" class="infos__item__link link-arrow"><?= $name ?></a>
                        <?php
                        endforeach;
                        ?>
                    </div>

                    <!-- Collections -->
                    <div class="infos__item">
                        <h2 class="infos__item__title">Collection</h2>
                        <?php
                        $collections = get_the_terms($post->ID, "collections");
                        foreach ($collections as $collection):

                        	$name = $collection->name;
                        	$link = get_term_link(
                        		$collection->slug,
                        		"collections"
                        	);
                        	?>
                        <a href="<?= $link ?>" class="infos__item__link link-arrow"><?= $name ?></a>
                        <?php
                        endforeach;
                        ?>
                    </div>

                    <!-- ISBN -->
                    <?php
                    $isbn = get_field("isbn");
                    if ($isbn): ?>
                    <div class="infos__item">
                        <h2 class="infos__item__title">ISBN</h2>
                        <p><?= $isbn ?></p>
                    </div>
                    <?php endif;
                    ?>

                    <!-- Caractéristiques -->
                    <?php
                    $caracteristiques = get_field("caracteristiques_du_livre");
                    if ($caracteristiques): ?>
                    <div class="infos__item">
                        <h2 class="infos__item__title">Caractéristiques</h2>
                        <p><?= $caracteristiques ?></p>
                    </div>
                    <?php endif;
                    ?>
                    
                    <!-- Prix -->
                    <?php
                    $prix = get_field("prix");
                    if ($prix): ?>
                    <div class="infos__item">
                        <h2 class="infos__item__title">Prix</h2>
                        <p><?= $prix ?> €</p>
                    </div>
                    <?php endif;
                    ?>
                </div>
            </div>
        </section>

        <!-- DANS LA MEME THEMATIQUE -->
        <section class="associes section-pad-top">
            <div class="container lg:flex lg:items-center lg:justify-between">
                <h2 class="section-title">Dans la même thématique</h2>
                <div class="hidden lg:block">
                <?php foreach ($thematiques as $thematique):
                	$slug = $thematique->slug;
                	$link = get_term_link($thematique->slug, "thematiques");
                	if ($slug !== "nouveautes") {
                		break;
                	}
                endforeach; ?>
                    <a href="<?= $link ?>" class="btn-secondary">Explorer cette thématique</a>    
                </div>
            </div>
            
            <div class="associes__list container">
                <?php
                $tax_query = ["relation" => "OR"];

                foreach ($thematiques as $thematique) {
                	$tax_query[] = [
                		"taxonomy" => "thematiques",
                		"field" => "slug",
                		"terms" => $thematique->slug,
                	];
                }

                $args = [
                	"post_type" => ["livre"],
                	"posts_per_page" => "3",
                	"post__not_in" => [$post->ID],
                	"tax_query" => $tax_query,
                ];
                $query = new WP_Query($args);

                if ($query->have_posts()):
                	while ($query->have_posts()):
                		$query->the_post();
                		get_template_part("/template-parts/livre-card");
                	endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <div class="container text-center mt-8 lg:hidden">
                <a href="#" class="btn-secondary">Explorer cette thématique</a>    
            </div>
        </section>

    </div>

<?php get_footer(); ?>
