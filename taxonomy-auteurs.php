<?php
get_header();
$term = $wp_query->queried_object;

// On récupère la photo de l'auteur si elle est renseigné sinon on affiche une image par defaut
if (get_field("photo", "auteurs_" . $term->term_id)) {
	$photo = get_field("photo", "auteurs_" . $term->term_id);
}

$prenom = get_field("prenom", "auteurs_" . $term->term_id);
$liens = get_field("liens", "auteurs_" . $term->term_id);
?>

    <div class="fiche-auteur page-container no-bulles">
        
        <!-- PRESENTATION -->
        <section class="presentation section-pad-top">
            <div class="container">
                <!-- left -->
                <div class="left" data-reveal>
                    <h1 class="presentation__title page-title"><span class="text-xl"><?= $prenom ?> </span><br><?php single_term_title(); ?></h1>
                    <div class="presentation__description"><?php the_archive_description(); ?></div>

                    <?php if ($liens): ?>
                    <ul class="presentation__links">
                        <?php foreach ($liens as $lien):
                        	if (!empty($lien["nom_du_lien"])): ?>

                            <li><a target="_blank" class="link-arrow" href="<?= $lien[
                            	"url_du_lien"
                            ] ?>"><?= $lien["nom_du_lien"] ?></a></li>
                        
                        <?php endif;
                        endforeach; ?>
                    </ul>
                    <?php endif; ?>

                </div>
                <!-- Right -->
                <div class="right">
                    <div class="img-container" data-reveal>
                        <?php if ($photo) {
                        	echo wp_get_attachment_image(
                        		$photo["id"],
                        		"medium_large"
                        	);
                        } else {
                        	$photo =
                        		get_template_directory_uri() .
                        		"/src/img/portrait-auteur.png";
                        	echo '<img src="' .
                        		$photo .
                        		'" alt="portrait auteur générique">';
                        } ?>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- LIVRES -->
        <?php
        $args = [
        	"post_type" => ["livre"],
        	"posts_per_page" => -1,
        	"tax_query" => [
        		[
        			"taxonomy" => "auteurs",
        			"field" => "slug",
        			"terms" => $term->slug,
        		],
        	],
        ];
        $query = new WP_Query($args);
        if ($query->have_posts()): ?>
        <section class="livres section-pad-top">
            <div class="container">
                <h2 class="section-title mb-8">Par cet.te auteur.e</h2>
                <div class="livres__list">
                    

                    <?php while ($query->have_posts()) {
                    	$query->the_post();
                    	get_template_part("./template-parts/livre-card");
                    } ?>

                    
                </div>
            </div>
        </section>
        <?php endif;
        ?>

        <section class="mt-16">
            <div class="container text-center">
                <a href="<?= get_site_url() ?>/auteurs" class="btn-primary">Voir tou.te.s nos auteur.e.s</a>
            </div>
        </section>

    </div>

<?php get_footer(); ?>
