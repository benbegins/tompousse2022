<?php

function filtre_thematiques(){
    // Donnees envoyees en Ajax
    $thematiques = $_POST['thematiques'];
    $thematique_parent = $_POST['thematique_parent'];

    // Security Check
    if (isset($thematiques) && !empty($thematiques)) {
		$thematiques = strip_tags($thematiques);
		$thematiques = stripslashes($thematiques);
		$thematiques = trim($thematiques);		
    }
    if (isset($thematique_parent) && !empty($thematique_parent)) {
		$thematique_parent = strip_tags($thematique_parent);
		$thematique_parent = stripslashes($thematique_parent);
		$thematique_parent = trim($thematique_parent);		
    }

    // Crée un tableau à partir de la liste de thématiques reçue
    $liste_thematiques = explode('&', $thematiques);

    // Crée un tableau avec les Tax_query 
    $query_thematiques = array('relation' => 'OR');

    // Si une sous-thématique est sélectionnée, on l'ajoute au tableau Tax Query
    // Sinon on créé une Tax_query avec la thématique parent
    if(empty($thematiques)){
        $query_thematiques = array(
            array(
                'taxonomy' => 'thematiques',
                'field' => 'slug',
                'terms' => $thematique_parent,
            )
        );
    } else {
        foreach($liste_thematiques as $thematique){
            $array = array(
                'taxonomy' => 'thematiques',
                'field' => 'slug',
                'terms' => $thematique,
            );
            $query_thematiques[] = $array;
        } 
        
    }
    


    // Reponse
    ob_start();
    
    ?>
        <div class="livres__list">
            <?php
            $args = array(
                'post_type'         => array( 'livre' ),
                'posts_per_page'             => -1,
                'tax_query'         => $query_thematiques,
            );
            $query = new WP_Query($args);
            
            if($query->have_posts()){
                while($query->have_posts()){
                    $query->the_post();
                    get_template_part( './template-parts/livre-card');
                }
            } else {
                echo 'Pas de livres à afficher dans cette thématique';
            }
            ?>
        </div>
        </div>

    <?php

    wp_send_json_success(ob_get_clean());
    // Fin Reponse
}

add_action('wp_ajax_filtre_thematiques', 'filtre_thematiques');
add_action('wp_ajax_nopriv_filtre_thematiques', 'filtre_thematiques');