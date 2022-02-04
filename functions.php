
<?php
// Configure les fonctionnalités de bases
function nomdutheme_theme_setup()
{
	// Prise en charge des images de mise en avant
	add_theme_support("post-thumbnails");

	// Ajouter automatiquement le titre du site dans l'entete
	add_theme_support("title-tag");
}
add_action("after_setup_theme", "nomdutheme_theme_setup");

// Ajout des scripts
function nomdutheme_theme_register_assets()
{
	// CSS
	wp_enqueue_style(
		"style",
		get_template_directory_uri() . "/dist/main.css",
		[],
		"1.0"
	);

	// JS
	wp_enqueue_script("vue", "https://unpkg.com/vue@3.2.20", [], "1.0", true);
	wp_enqueue_script(
		"main",
		get_template_directory_uri() . "/dist/main.js",
		["vue"],
		"1.0",
		true
	);
}
add_action("wp_enqueue_scripts", "nomdutheme_theme_register_assets");

// Custom image size
add_image_size("xl", 1440);
add_image_size("xxl", 1900);

// Create option page
if (function_exists("acf_add_options_page")) {
	acf_add_options_page();
}

//Disable plugin auto-update email notification
add_filter("auto_plugin_update_send_email", "__return_false");

// Custom Post / Taxonomies
require get_template_directory() . "/inc/custom-post.php";

// Filtre Thématiques Ajax
require get_template_directory() . "/inc/filtre_thematiques.php";

// Cleanup Wordpress
require get_template_directory() . "/inc/cleanup.php";

