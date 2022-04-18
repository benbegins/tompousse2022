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

                    </div>
                    <!-- Files -->
                    <div class="files-container">
                        <p>Retrouvez ci-dessous la liste des compléments à télécharger.</p>
    
                        <?php
                        $complements = get_field("complements");

                        $fichiers_pdf = [];
                        $fichiers_audio = [];
                        $fichiers_video = [];

                        // Classe chaque fichier par type
                        foreach ($complements as $complement) {
                        	switch ($complement["acf_fc_layout"]) {
                        		case "document_pdf":
                        			$fichiers_pdf[] = $complement;
                        			break;
                        		case "fichier_audio":
                        			$fichiers_audio[] = $complement;
                        			break;
                        		case "fichier_video":
                        			$fichiers_video[] = $complement;
                        			break;
                        	}
                        }
                        ?>


                        <!-- DOCUMENTS PDF -->
                        <?php if (!empty($fichiers_pdf)): ?>
                        <h2 class="section-title">Documents PDF</h2>
                        <ul class="documents_pdf">
                            <?php foreach ($fichiers_pdf as $fichier): ?>
                            <li class="mt-4">
                                <p class="mr-4"><?= $fichier[
                                	"nom_du_document"
                                ] ?></p>
                                <a href="<?= $fichier["document_pdf"][
                                	"url"
                                ] ?>" class="btn-download no-cursor" target="_blank">Télécharger</a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>


                        <!-- FICHIERS AUDIO -->
                        <?php if (!empty($fichiers_audio)): ?>
                        <h2 class="section-title">Audio</h2>
                        <ul class="fichiers_audio">
                            <?php foreach ($fichiers_audio as $fichier): ?>
                            <li class="mt-4">
                                <p class="w-full"><?= $fichier[
                                	"nom_du_fichier"
                                ] ?></p>
                                <div class="mt-2 audio-container">
                                    <audio class="mr-4" controls src="<?= $fichier[
                                    	"fichier_audio"
                                    ]["url"] ?>"></audio>
                                    <a href="<?= $fichier["fichier_audio"][
                                    	"url"
                                    ] ?>" download="<?= $fichier[
	"fichier_audio"
]["filename"] ?>" class="btn-download no-cursor my-1" target="_blank">Télécharger</a>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        
                        
                        <!-- FICHIERS VIDEO -->
                        <?php if (!empty($fichiers_video)): ?>
                        <h2 class="section-title">Vidéos</h2>
                        <ul class="fichiers_audio">
                            <?php foreach ($fichiers_video as $fichier): ?>
                            <li class="mt-4">
                                <a href="<?= $fichier[
                                	"lien_video"
                                ] ?>" class="link-arrow" target="_blank"><?= $fichier[
	"nom_du_fichier"
] ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>


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
