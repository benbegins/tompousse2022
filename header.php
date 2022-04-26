<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107977583-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-107977583-1');
	</script>
    
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<?php get_template_part('./template-parts/page-transition'); ?>

<div id="page" class="site-container">

    <header class="site-header" :class="{compact: menuCompact}">
        <div class="site-header__container container">
            <div class="logo">
                <a href="<?= get_site_url() ?>"></a>
            </div>
            <div class="menu">
                <!-- Burger -->
                <div class="burger" @click="menuActive = !menuActive, subMenuActive = false" :class="{active: menuActive}"></div>
                <!-- Main Menu -->
                <nav class="main-nav" :class="{active: menuActive}" aria-label="menu principal">
                    <p class="nav-title">Menu</p>
                    <ul>
                        <li><button class="nav-btn nav-btn__nos-livres no-cursor" @click="subMenuActive = !subMenuActive">Nos livres</button></li>
                        <li><a href="<?= get_site_url() ?>/collections">Collections</a></li>
                        <!-- <li><a href="<?= get_site_url() ?>/applications">Applications</a></li> -->
                        <li><a href="<?= get_site_url() ?>/blog">Blog</a></li>
                        <li><a href="<?= get_site_url() ?>/maison-edition">À propos</a></li>
                        <li class="search-mobile lg:hidden">
                            <?php get_template_part(
                            	"./template-parts/form-search"
                            ); ?>
                        </li>
                        <li class="search-desktop hidden lg:block">
                            <button class="btn-search" @click="openSearchModal">Recherche</button>
                        </li>
                    </ul>     
                </nav>
                <!-- Submenu Nos Livres -->
                <div class="submenu submenu__thematiques" :class="{active: subMenuActive}">
                    <button class="btn-back" @click="subMenuActive = false"></button>
                    <p class="nav-title">Thématiques</p>
                    <ul>
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
                        		" <sup>" .
                        		$count .
                        		"</sup></a></li>";
                        endforeach;
                        ?>
                    </ul>
                    <div class="background hidden lg:block"></div>
                </div>
            </div>
            <!-- Liens RS -->
            <?php
            $instagram = get_field("instagram", "option");
            $facebook = get_field("facebook", "option");
            $twitter = get_field("twitter", "option");
            $linkedin = get_field("linkedin", "option");
            $youtube = get_field("youtube", "option");
            ?>
            <ul class="reseaux hidden lg:block">
                <li>
                    <a href="<?= $instagram ?>" target="_blank">
                        <img src="<?= get_template_directory_uri() ?>/src/img/icon-instagram.svg" alt="Instagram">
                    </a>
                </li>
                <li>
                    <a href="<?= $facebook ?>" target="_blank">
                        <img src="<?= get_template_directory_uri() ?>/src/img/icon-facebook.svg" alt="facebook">
                    </a>
                </li>
                <li>
                    <a href="<?= $twitter ?>" target="_blank">
                        <img src="<?= get_template_directory_uri() ?>/src/img/icon-twitter.svg" alt="twitter">
                    </a>
                </li>
                <li>
                    <a href="<?= $linkedin ?>" target="_blank">
                        <img src="<?= get_template_directory_uri() ?>/src/img/icon-linkedin.svg" alt="linkedin">
                    </a>
                </li>
                <li>
                    <a href="<?= $youtube ?>" target="_blank">
                        <img src="<?= get_template_directory_uri() ?>/src/img/icon-youtube.svg" alt="youtube">
                    </a>
                </li>
            </ul>
        </div>
        <!-- Overlays -->
        <div class="overlay overlay-menu lg:hidden" :class="{active: menuActive}" @click="menuActive = false"></div>
        <div class="overlay overlay-submenu" :class="{active: subMenuActive}" @click="subMenuActive = false" @mouseOver="closeSubMenu"></div>
    </header>
    
    <?php get_template_part("./template-parts/search-modal"); ?>