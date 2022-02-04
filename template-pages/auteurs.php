<?php
/*
Template Name: Auteurs
*/
get_header(); ?>

    <div class="page-auteurs page-container">

        <!-- INTRO -->
        <section class="intro">
            <div class="container">
                <h1 class="intro__title page-title" data-reveal>Nos auteur.e.s</h1>
                <div class="intro__description" data-reveal><?php the_content(); ?></div>
            </div>
        </section>

        <section class="auteurs section-pad-top">
            <div class="container text-center">
                <ul class="auteurs__list" data-reveal>
                    <!-- LISTE AUTEURS -->
                    <?php
                    $args = [
                    	"taxonomy" => "auteurs",
                    	"parent" => 0,
                    ];
                    $auteurs = get_terms($args);
                    $firstLetter = "";
                    foreach ($auteurs as $auteur):

                    	$prenom = get_field(
                    		"prenom",
                    		"auteurs_" . $auteur->term_id
                    	);
                    	$nom = $auteur->name;
                    	$link = get_term_link($auteur->term_id);
                    	$slug = $auteur->slug;

                    	// Si le nom change de première lettre, on affiche la lettre dans un <li>
                    	if ($firstLetter !== strtolower($nom[0])): ?>
                            <li class="letter"><?= $nom[0] ?></li>
                        <?php endif;

                    	$firstLetter = strtolower($nom[0]);
                    	?> 

                    <li class="auteurs__item"><a href="<?= $link ?>"><strong><?= $nom ?></strong> <?= $prenom ?></a></li>

                    <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        </section>
            

    </div>

<?php get_footer(); ?>
