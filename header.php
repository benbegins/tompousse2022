<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<div id="page" class="site-container">

    <header class="site-header" :class="{compact: menuCompact}">
        <div class="site-header__container container">
            <div class="logo">
                <a href="<?= get_site_url(); ?>"></a>
            </div>
            <div class="menu">
                <!-- Burger -->
                <div class="burger" @click="menuActive = !menuActive, subMenuActive = false" :class="{active: menuActive}"></div>
                <!-- Main Menu -->
                <nav class="main-nav" :class="{active: menuActive}">
                    <p class="nav-title">Menu</p>
                    <ul>
                        <li><button class="nav-btn nav-btn__nos-livres" @click="subMenuActive = !subMenuActive">Nos livres</button></li>
                        <li><a href="#">Collections</a></li>
                        <li><a href="#">Applications</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">À propos</a></li>
                        <li class="search-mobile lg:hidden">
                            <form action="/" method="get">
                                <input type="text" placeholder="Titre, collection, auteur(e)…" name="s" id="search" value="<?php the_search_query(); ?>" />
                                <input type="submit" value="Rechercher">
                            </form>
                        </li>
                        <li class="search-desktop hidden lg:block">
                            <button class="btn-search">Recherche</button>
                        </li>
                    </ul>     
                </nav>
                <!-- Submenu Nos Livres -->
                <div class="submenu submenu__thematiques" :class="{active: subMenuActive}">
                    <button class="btn-back" @click="subMenuActive = false"></button>
                    <p class="nav-title">Thématiques</p>
                    <ul>
                        <?php 
                        $args = array(
                            'taxonomy' => 'thematiques',
                            'parent' => 0,
                        );
                        $thematiques = get_terms($args);
                        foreach($thematiques as $thematique):
                            $name = $thematique->name;
                            $count = $thematique->count;
                            $link = get_term_link($thematique->term_id);
                            
                            echo '<li><a href="' . $link . '">' . $name . ' <sup>' . $count . '</sup></a></li>';

                        endforeach;
                        ?>
                    </ul>
                    <div class="background hidden lg:block"></div>
                </div>
            </div>
            <!-- Liens RS -->
            <ul class="reseaux hidden lg:block">
                <li>
                    <a href="">
                        <img src="<?= get_template_directory_uri(); ?>/src/img/icon-instagram.svg" alt="Instagram">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="<?= get_template_directory_uri(); ?>/src/img/icon-facebook.svg" alt="facebook">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="<?= get_template_directory_uri(); ?>/src/img/icon-twitter.svg" alt="twitter">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="<?= get_template_directory_uri(); ?>/src/img/icon-linkedin.svg" alt="linkedin">
                    </a>
                </li>
                <li>
                    <a href="">
                        <img src="<?= get_template_directory_uri(); ?>/src/img/icon-youtube.svg" alt="youtube">
                    </a>
                </li>
            </ul>
        </div>
        <!-- Overlays -->
        <div class="overlay overlay-menu lg:hidden" :class="{active: menuActive}" @click="menuActive = false"></div>
        <div class="overlay overlay-submenu" :class="{active: subMenuActive}" @click="subMenuActive = false" @mouseOver="closeSubMenu"></div>
    </header>