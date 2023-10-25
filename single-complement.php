<?php get_header(); ?>

    <div class="page-complement page-container no-bulles">

        <section class="section-pad-top">
            <div class="container">
                <div class="left" data-reveal>
                    <!-- Title -->
                    <div class="title-container" data-reveal>
                        <p class="complements">Compléments</p>

                        <?php $livre = get_field("livre_associe"); ?>
                        <h1 class="section-title">
                            <?php if ($livre) {
                            	echo $livre->post_title;
                            } else {
                            	the_title();
                            } ?>
                        </h1>

                        <?php 
                        $content = get_the_content();
                        if($content):
                        ?>
                        <div class="description">
                            <?= $content; ?>
                        </div>
                        <?php endif; ?>

                    </div>
                    <!-- Files -->
                    <div class="files-container">
                        <!-- <p>Retrouvez ci-dessous la liste des compléments à télécharger.</p> -->
    
                        <?php
                        $complements = get_field("complements");

                        foreach($complements as $complement):
                            switch ($complement["acf_fc_layout"]) :
                        		case "document_pdf":
                        ?>
                                <div class="mt-4">
                                    <p class="mr-4"><?= $complement[
                                        "nom_du_document"
                                    ] ?></p>
                                    <a href="<?= $complement["document_pdf"][
                                        "url"
                                    ] ?>" class="btn-download no-cursor" target="_blank">Télécharger</a>
                                </div>
                        <?php
                        			break;
                                case "fichier_audio":
                        ?>
                                <div class="mt-4">
                                    <p class="w-full"><?= $complement[
                                        "nom_du_fichier"
                                    ] ?></p>
                                    <div class="mt-2 audio-container">
                                        <audio class="mr-4" controls controlsList="nodownload" src="<?= $complement[
                                            "fichier_audio"
                                        ]["url"] ?>"></audio>
                                    </div>
                                </div>
                        <?php
                                    break;
                                case "fichier_video":
                        ?>
                                <div class="mt-4">
                                    <div class="embed-container"><?= $complement["lien_video"] ?></div>
                                </div>
                        <?php
                                    break;
                                case "zone_de_texte":
                        ?>
                                <h2 class="section-title"><?= $complement['texte']; ?></h2>
                        <?php
                                    break;
                            endswitch;
                        endforeach;
                        ?>

                        <!-- TOUT TELECHARGER -->
                        <?php 
                        $tout_telecharger = get_field('tout_telecharger');
                        if($tout_telecharger): 
                        ?>
                        <a href="<?= $tout_telecharger['url'] ?>" download="<?= $tout_telecharger['name'] ?>" target="_blank" class="btn-primary mt-16">Télécharger tous les documents</a>
                        <?php endif; ?>

                    </div>
                </div>

                <div class="right">
                    <pre>
                        <?php
                        $livre = get_field("livre_associe");
                        $couverture = get_field("couverture", $livre->ID);
                        $size = "medium";
                        ?>
                    </pre>
                    <div class="livre">
                        <div class="couverture" data-reveal>
                        <?= wp_get_attachment_image(
                        	$couverture["id"],
                        	$size
                        ) ?>  
                        </div>
                        <a href="<?= get_permalink(
                        	$livre->ID
                        ) ?>" class="btn-secondary">Voir la fiche détaillée</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

<?php get_footer(); ?>
