<?php
/*
Template Name: Page de texte
*/
get_header(); ?>

    <div class="page-texte page-container">

        <!-- INTRO -->
        <section class="intro intro-padding text-center">
            <div class="container">
                <h1 class="intro__title page-title" data-reveal><?php the_title(); ?></h1>
            </div>
        </section>

        <section class="rich-text section-pad-top" ref="richText">
            <div class="container">
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>            

    </div>

<?php get_footer(); ?>
