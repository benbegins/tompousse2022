    <footer class="site-footer section-pad-top">
        <div class="container">
            <div class="main-footer">
                <div class="part-1">
                    <!-- Newsletter -->
                    <div class="footer-newsletter">
                        <p class="section-title">Newsletter</p>
                        <p class="my-8">Inscrivez-vous pour être informé de la sortie de nos prochaines publications.</p>
                        <?php get_template_part(
                        	"./template-parts/newsletter"
                        ); ?>
                    </div>
                    <!-- Nos livres -->
                    <nav aria-label="Les thématiques de livre">
                        <p class="main-footer__title">Nos livres</p>
                        <ul class="cat-list">
                            <?php
                            $args = [
                            	"taxonomy" => "thematiques",
                            	"parent" => 0,
                            	"orderby" => "term_id",
                            ];
                            $thematiques = get_terms($args);
                            foreach ($thematiques as $thematique):
                            	$name = $thematique->name;
                            	$count = $thematique->count;
                            	$link = get_term_link($thematique->term_id);

                            	echo '<li><a href="' .
                            		$link .
                            		'">' .
                            		$name .
                            		"</a></li>";
                            endforeach;
                            ?>
                        </ul>
                    </nav>
                    <!-- Nos Collection -->
                    <nav aria-label="Les collections">
                        <p class="main-footer__title">Nos collections</p>
                        <ul class="cat-list">
                            <?php
                            $args = [
                            	"taxonomy" => "collections",
                            	"parent" => 0,
                            ];
                            $collections = get_terms($args);
                            foreach ($collections as $collection):
                            	$name = $collection->name;
                            	$count = $collection->count;
                            	$link = get_term_link($collection->term_id);

                            	echo '<li><a href="' .
                            		$link .
                            		'">' .
                            		$name .
                            		"</a></li>";
                            endforeach;
                            ?>
                        </ul>
                    </nav>
                    <!-- Menu secondaire -->
                    <nav class="menu-secondaire" aria-label="menu secondaire">
                        <ul>
                            <li><a href="<?= get_site_url() ?>/applications">Applications</a></li>
                            <li><a href="<?= get_site_url() ?>/blog">Blog</a></li>
                            <li><a href="<?= get_site_url() ?>/maison-edition">À propos</a></li>
                            <li><a href="<?= get_site_url() ?>/auteurs">Nos auteurs</a></li>
                            <li><a href="<?= get_site_url() ?>/ou-trouver-nos-livres">Où trouver nos livres</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="part-2">
                    <div class="adress-reseaux__container">
                        <div class="adress"><p>33 boulevard Arago <br>75013 PARIS<br>01 44 49 75 00</p></div>

                        <?php
                        $instagram = get_field("instagram", "option");
                        $facebook = get_field("facebook", "option");
                        $twitter = get_field("twitter", "option");
                        $linkedin = get_field("linkedin", "option");
                        $youtube = get_field("youtube", "option");
                        ?>
                        <ul class="reseaux">
                            <li>
                                <a href="<?= $instagram ?>" target="_blank">
                                    <img src="<?= get_template_directory_uri() ?>/src/img/icon-instagram-white.svg" alt="Instagram">
                                </a>
                            </li>
                            <li>
                                <a href="<?= $facebook ?>" target="_blank">
                                    <img src="<?= get_template_directory_uri() ?>/src/img/icon-facebook-white.svg" alt="facebook">
                                </a>
                            </li>
                            <li>
                                <a href="<?= $twitter ?>" target="_blank">
                                    <img src="<?= get_template_directory_uri() ?>/src/img/icon-twitter-white.svg" alt="twitter">
                                </a>
                            </li>
                            <li>
                                <a href="<?= $linkedin ?>" target="_blank">
                                    <img src="<?= get_template_directory_uri() ?>/src/img/icon-linkedin-white.svg" alt="linkedin">
                                </a>
                            </li>
                            <li>
                                <a href="<?= $youtube ?>" target="_blank">
                                    <img src="<?= get_template_directory_uri() ?>/src/img/icon-youtube-white.svg" alt="youtube">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="contact">
                        <a href="<?= get_site_url() ?>/contact">Contact</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mentions -->
        <div class="mentions">
            <div class="container">
                <p class="left">© Alta Communication <?= date(
                	"Y"
                ) ?>, tous droits réservés. </p>
                <div class="right">
                    <a class="link-basic btn-mentions" href="<?= get_site_url() ?>/mentions-legales">Mentions légales</a>
                    <p>Conçu par <a href="https:bemy.studio" class="btn-bemy" target="_blank"><img class="inline-block" src="<?= get_template_directory_uri() ?>/src/img/logo-bemy.svg" alt="Logo Bemy Studio"></a></p>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>