<?php
/*
Template Name: Applications
*/
get_header(); ?>

<div class="page-applications page-container">

    <!-- INTRO -->
    <section class="intro">
        <div class="container">
            <h1 class="page-title" data-reveal>Applications</h1>
            <div data-reveal><?php the_content(); ?></div>
        </div>
    </section>

    <!-- APPLICATIONS -->
    <?php if (have_rows("application")):
    	while (have_rows("application")):
    		the_row(); ?>
    
    <section class="application section-pad-top">
        <div class="container">
            <h2 class="application__title section-title"><?php the_sub_field(
            	"nom_de_lapplication"
            ); ?></h2>
            <div class="application__img-container">
                <?php
                $image = get_sub_field("visuel");
                $size = "xxl"; // (thumbnail, medium, large, full or custom size)
                if ($image) {
                	echo wp_get_attachment_image($image["id"], $size);
                }
                ?>
            </div>
            <div class="application__description">
                <div class="accroche section-title"><?php the_sub_field(
                	"accroche"
                ); ?></div>
                <div class="content"><?php the_sub_field(
                	"description"
                ); ?></div>
            </div>
        </div>
    </section>
    
    <?php
    	endwhile;
    endif; ?>

</div>

<?php get_footer(); ?>
