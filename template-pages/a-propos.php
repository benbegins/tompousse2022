<?php
/*
Template Name: A propos
*/
get_header(); ?>

<div class="page-apropos page-container">

    <!-- INTRO -->
    <section class="intro">
        <div class="container">
            <h1 class="page-title" data-reveal>Tom Pousse est une maison d’édition spécialiste des troubles des apprentissages, de la cognition et des troubles Dys.</h1>
        </div>
    </section>

    <!-- PART 1 -->
    <section class="part-1 section-pad-top" data-reveal>
        <div class="container">
            <div class="content-wrapper">
                <div class="text-container">
                    <p class="text-intro">Les Éditions Tom Pousse et Tom Pousse interactive ont pour vocation de fournir depuis une dizaine d’années aux enseignants, aux parents et à tous ceux qui contribuent à assurer une bonne scolarité aux élèves du primaire :</p>
                    <div class="paragraph-container">
                        <p class="chiffre">01</p>
                        <p class="paragraph">Des ouvrages suscitant, à partir d’expériences pédagogiques concrètes, et à la lumière de l’avancée des neurosciences une réflexion sur le suivi nécessaire aux enfants en difficulté scolaire ou souffrant de troubles des apprentissages.</p>
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
    <section class="part-2 section-pad-top">
        <div class="container">
            <div class="content-wrapper">
                <div>
                    <h2 class="section-title">Aujourd’hui Tom Pousse élargit son catalogue.</h2>
                </div>
                <div>
                    <p class="paragraph">Il s’enrichit d’ouvrages pour accompagner les jeunes et les adultes en difficulté dans la vie quotidienne, et dont l’état de santé mobilise l’entourage pour un accompagnement de longue durée : Alzheimer, diabète, anorexie, épilepsie, etc.</p>
                    <p class="paragraph">La vie des familles et les relations qu’elles entretiennent avec les institutions (Éducation nationale, faculté de médecine et structures d’accompagnement) sont souvent entachées d’un manque d’information, donc de préjugés qui nuisent à l’accompagnement des proches en situation de handicap.</p>
                    <p class="paragraph">Notre souhait est d’apporter une information fiable, mais à la portée de tous.</p>
                    <div class="mt-8 md:flex items-center">
                        <a href="<?= get_site_url() ?>/collections" class="btn-primary mr-8">Découvrez nos collections</a>
                        <a href="<?= get_site_url() ?>/contact" class="link-basic">Contactez-nous</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
