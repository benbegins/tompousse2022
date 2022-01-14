<?php 
/**
 * Register Custom Post Type Livre
 */
function post_type_livre() {

	$labels = array(
		'name'                  => _x( 'livres', 'Post Type General Name', 'tompousse' ),
		'singular_name'         => _x( 'livre', 'Post Type Singular Name', 'tompousse' ),
		'menu_name'             => __( 'Livres', 'tompousse' ),
		'name_admin_bar'        => __( 'Livre', 'tompousse' ),
		'archives'              => __( 'Archives', 'tompousse' ),
		'attributes'            => __( 'Attributes', 'tompousse' ),
		'parent_item_colon'     => __( 'Parent Item:', 'tompousse' ),
		'all_items'             => __( 'Tous les livres', 'tompousse' ),
		'add_new_item'          => __( 'Ajouter un livre', 'tompousse' ),
		'add_new'               => __( 'Ajouter un livre', 'tompousse' ),
		'new_item'              => __( 'Nouveau livre', 'tompousse' ),
		'edit_item'             => __( 'Modifier le livre', 'tompousse' ),
		'update_item'           => __( 'Mettre a jour', 'tompousse' ),
		'view_item'             => __( 'Voir le livre', 'tompousse' ),
		'view_items'            => __( 'Voir les livres', 'tompousse' ),
		'search_items'          => __( 'Rechercher un livre', 'tompousse' ),
		'not_found'             => __( 'Rien trouve', 'tompousse' ),
		'not_found_in_trash'    => __( 'Rien dans la corbeille', 'tompousse' ),
		'featured_image'        => __( 'Couverture', 'tompousse' ),
		'set_featured_image'    => __( 'Définir une couverture', 'tompousse' ),
		'remove_featured_image' => __( 'Retirer la couverture', 'tompousse' ),
		'use_featured_image'    => __( 'Utiliser comme couverture', 'tompousse' ),
		'insert_into_item'      => __( 'Insert into item', 'tompousse' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'tompousse' ),
		'items_list'            => __( 'Items list', 'tompousse' ),
		'items_list_navigation' => __( 'Items list navigation', 'tompousse' ),
		'filter_items_list'     => __( 'Filter items list', 'tompousse' ),
	);
	$args = array(
		'label'                 => __( 'livre', 'tompousse' ),
		'description'           => __( 'livres', 'tompousse' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'taxonomies'            => array( 'collections', ' thematiques', ' auteurs'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'livre', $args );

}
add_action( 'init', 'post_type_livre', 0 );


/**
 * Register Custom Taxonomy Thématiques
 */ 
function custom_taxonomy_thematiques() {

	$labels = array(
		'name'                       => _x( 'Thématiques', 'Taxonomy General Name', 'tompousse' ),
		'singular_name'              => _x( 'Thématique', 'Taxonomy Singular Name', 'tompousse' ),
		'menu_name'                  => __( 'Thématiques', 'tompousse' ),
		'all_items'                  => __( 'Toutes les thématiques', 'tompousse' ),
		'parent_item'                => __( 'Thématique parent', 'tompousse' ),
		'parent_item_colon'          => __( 'Thématique parent', 'tompousse' ),
		'new_item_name'              => __( 'Nouvelle thématique', 'tompousse' ),
		'add_new_item'               => __( 'Ajouter une thématique', 'tompousse' ),
		'edit_item'                  => __( 'Modifier la thématique', 'tompousse' ),
		'update_item'                => __( 'Mettre à jour', 'tompousse' ),
		'view_item'                  => __( 'Voir le thématique', 'tompousse' ),
		'separate_items_with_commas' => __( 'Séparer par des virgules', 'tompousse' ),
		'add_or_remove_items'        => __( 'Ajouter ou retirer un élément', 'tompousse' ),
		'choose_from_most_used'      => __( 'Choisir parmis les plus utilisés', 'tompousse' ),
		'popular_items'              => __( 'Populaire', 'tompousse' ),
		'search_items'               => __( 'Rechercher une thématique', 'tompousse' ),
		'not_found'                  => __( 'Rien trouvé', 'tompousse' ),
		'no_terms'                   => __( 'Pas de résultat', 'tompousse' ),
		'items_list'                 => __( 'Liste des thématiques', 'tompousse' ),
		'items_list_navigation'      => __( 'Items list navigation', 'tompousse' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'thematiques', array( 'livre' ), $args );

}
add_action( 'init', 'custom_taxonomy_thematiques', 0 );



/**
 * Register Custom Taxonomy Collections
 */ 
function custom_taxonomy_collections() {

	$labels = array(
		'name'                       => _x( 'Collections', 'Taxonomy General Name', 'tompousse' ),
		'singular_name'              => _x( 'Collection', 'Taxonomy Singular Name', 'tompousse' ),
		'menu_name'                  => __( 'Collections', 'tompousse' ),
		'all_items'                  => __( 'Toutes les collections', 'tompousse' ),
		'parent_item'                => __( 'Parent Item', 'tompousse' ),
		'parent_item_colon'          => __( 'Parent Item:', 'tompousse' ),
		'new_item_name'              => __( 'Nouvelle collection', 'tompousse' ),
		'add_new_item'               => __( 'Ajouter une collection', 'tompousse' ),
		'edit_item'                  => __( 'Modifier la collection', 'tompousse' ),
		'update_item'                => __( 'Mettre à jour la collection', 'tompousse' ),
		'view_item'                  => __( 'Voir la collection', 'tompousse' ),
		'separate_items_with_commas' => __( 'Séparer les éléments par une virgule', 'tompousse' ),
		'add_or_remove_items'        => __( 'Ajouter ou retirer une collection', 'tompousse' ),
		'choose_from_most_used'      => __( 'Choisir parmis les plus utilisées', 'tompousse' ),
		'popular_items'              => __( 'Les plus populaires', 'tompousse' ),
		'search_items'               => __( 'Rechercher des collections', 'tompousse' ),
		'not_found'                  => __( 'Rien trouvé', 'tompousse' ),
		'no_terms'                   => __( 'Pas de collection', 'tompousse' ),
		'items_list'                 => __( 'Liste des collections', 'tompousse' ),
		'items_list_navigation'      => __( 'Liste des collections', 'tompousse' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'collections', array( 'livre' ), $args );

}
add_action( 'init', 'custom_taxonomy_collections', 0 );


/**
 * Register Custom Taxonomy Auteurs
 */ 
function custom_taxonomy_auteurs() {

	$labels = array(
		'name'                       => _x( 'Auteur(e)s', 'Taxonomy General Name', 'tompousse' ),
		'singular_name'              => _x( 'Auteur', 'Taxonomy Singular Name', 'tompousse' ),
		'menu_name'                  => __( 'Auteur(e)s', 'tompousse' ),
		'all_items'                  => __( 'Tous les auteur(e)s', 'tompousse' ),
		'parent_item'                => __( 'Parent Item', 'tompousse' ),
		'parent_item_colon'          => __( 'Parent Item:', 'tompousse' ),
		'new_item_name'              => __( 'Nouvel(le) auteur(e)', 'tompousse' ),
		'add_new_item'               => __( 'Ajouter un(e) nouvel(le) auteur(e)', 'tompousse' ),
		'edit_item'                  => __( 'Modifier l\'auteur(e)', 'tompousse' ),
		'update_item'                => __( 'Mettre à jour l\'auteur(e)', 'tompousse' ),
		'view_item'                  => __( 'Voir l\'auteur(e)', 'tompousse' ),
		'separate_items_with_commas' => __( 'Séparer les auteurs par des virgules', 'tompousse' ),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer un(e) auteur(e)', 'tompousse' ),
		'choose_from_most_used'      => __( 'Choisir parmis les plus populaires', 'tompousse' ),
		'popular_items'              => __( 'Auteurs populaires', 'tompousse' ),
		'search_items'               => __( 'Rechercher un(e) auteur(e)', 'tompousse' ),
		'not_found'                  => __( 'Rien trouvé', 'tompousse' ),
		'no_terms'                   => __( 'Pas d\'auteur', 'tompousse' ),
		'items_list'                 => __( 'Liste des auteur(e)s', 'tompousse' ),
		'items_list_navigation'      => __( 'Liste des auteur(e)s', 'tompousse' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'auteurs', array( 'livre' ), $args );

}
add_action( 'init', 'custom_taxonomy_auteurs', 0 );

/**
 * Register Custom Post Type Actualités
 */
function post_type_actualite() {

	$labels = array(
		'name'                  => _x( 'Actualités', 'Post Type General Name', 'tompousse' ),
		'singular_name'         => _x( 'Actualité', 'Post Type Singular Name', 'tompousse' ),
		'menu_name'             => __( 'Actualités', 'tompousse' ),
		'name_admin_bar'        => __( 'Actualité', 'tompousse' ),
		'archives'              => __( 'Archives', 'tompousse' ),
		'attributes'            => __( 'Item Attributes', 'tompousse' ),
		'parent_item_colon'     => __( 'Parent Item:', 'tompousse' ),
		'all_items'             => __( 'Toutes les actus', 'tompousse' ),
		'add_new_item'          => __( 'Ajouter une actu', 'tompousse' ),
		'add_new'               => __( 'Ajouter une actu', 'tompousse' ),
		'new_item'              => __( 'Nouvelle actu', 'tompousse' ),
		'edit_item'             => __( 'Modifier l\'actu', 'tompousse' ),
		'update_item'           => __( 'Mettre à jour l\'actu', 'tompousse' ),
		'view_item'             => __( 'Voir l\'actu', 'tompousse' ),
		'view_items'            => __( 'Voir les actus', 'tompousse' ),
		'search_items'          => __( 'Rechercher une actu', 'tompousse' ),
		'not_found'             => __( 'Rien trouvé', 'tompousse' ),
		'not_found_in_trash'    => __( 'Rien dans la corbeille', 'tompousse' ),
		'featured_image'        => __( 'Featured Image', 'tompousse' ),
		'set_featured_image'    => __( 'Set featured image', 'tompousse' ),
		'remove_featured_image' => __( 'Remove featured image', 'tompousse' ),
		'use_featured_image'    => __( 'Use as featured image', 'tompousse' ),
		'insert_into_item'      => __( 'Insert into item', 'tompousse' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'tompousse' ),
		'items_list'            => __( 'Items list', 'tompousse' ),
		'items_list_navigation' => __( 'Items list navigation', 'tompousse' ),
		'filter_items_list'     => __( 'Filter items list', 'tompousse' ),
	);
	$args = array(
		'label'                 => __( 'Actualité', 'tompousse' ),
		'description'           => __( 'Actualité de Tom Pousse : évènements, sorties,...', 'tompousse' ),
		'labels'                => $labels,
		'supports'              => array( ),
		'taxonomies'            => array( ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'actualite', $args );

}
add_action( 'init', 'post_type_actualite', 0 );