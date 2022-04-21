<?php
/*
Template Name: A propos
*/
get_header(); ?>

<div class="page-apropos page-container">

    <!-- INTRO -->
    <section class="intro">
        <div class="container">
            <h1 class="page-title" data-reveal>Accompagner les enfants et les adultes en difficulté d’apprentissage et/ou en situation de handicap.</h1>
        </div>
    </section>

    <!-- PART 1 -->
    <section class="part-1 section-pad-top" data-reveal>
        <div class="container">
            <div class="content-wrapper">
                <div class="text-container">
                    <p class="text-intro">Depuis une quinzaine d’années, les éditions Tom Pousse ont pour vocation de fournir aux parents, enseignants, aidants et à tous ceux qui participent à l'éducation des enfants des ouvrages pédagogiques adaptés&nbsp;:</p>
                    <div class="paragraph-container">
                        <p class="chiffre">01</p>
                        <p class="paragraph">Expériences concrètes et avancée des neurosciences alimentent nos ouvrages et notre réflexion sur la prise en charge des enfants en difficulté scolaire et/ou en situation de handicap.</p>
                    </div>
                    <div class="paragraph-container">
                        <p class="chiffre">02</p>
                        <p class="paragraph">Des contenus pédagogiques adaptés en version papier et numérique.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- IMAGE -->
    <section class="section-image section-pad-top">
        <div class="container">
            <div class="img-container">
                <?php the_post_thumbnail("xxl"); ?>
            </div>
        </div>
    </section>

    <!-- PART 2 -->
    <section class="part-2 section-pad">
        <div class="container">
            <div class="content-wrapper">
                <div>
                    <h2 class="section-title">Aujourd’hui Tom Pousse élargit son catalogue.</h2>
                </div>
                <div>
                    <p class="paragraph">Il s’enrichit d’ouvrages pour accompagner le passage à l’âge adulte des jeunes en situation de handicap. </p>
                    <p class="paragraph">Nous souhaitons en outre prendre en compte maladies ou troubles qui chez les adultes perturbent le quotidien, le bien-être et la vie familiale&nbsp;: Alzheimer, diabète, épilepsie, addictions, troubles alimentaires…</p>
                    <p class="paragraph">Notre souhait est d’apporter une information fiable et à la portée de tous.</p>
                    <div class="mt-8 md:flex items-center">
                        <a href="<?= get_site_url() ?>/collections" class="btn-primary mr-8">Découvrez nos collections</a>
                        <a href="<?= get_site_url() ?>/contact" class="link-basic">Contactez-nous</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EQUIPE -->
    <?php 
    if( have_rows('equipe') ):
    ?>
    <section class="equipe">
        <div class="container">
            <div class="content-wrapper">
                <div>
                    <h2 class="page-title">L'équipe</h2>
                </div>
                <div class="equipe__list">
                    <?php
                        while( have_rows('equipe') ) : the_row();
                    
                            $nom = get_sub_field('nom');
                            $fonction = get_sub_field('fonction');
                            $description = get_sub_field('description');
                    ?>

                    <div class="equipe__item">
                        <p class="nom"><?= $nom; ?></p>
                        <p class="fonction"><?= $fonction; ?></p>
                        <div class="description"><?= $description; ?></div>
                    </div>
                    
                    <?php
                        endwhile;
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif;  ?>

</div>

<?php get_footer(); ?>
