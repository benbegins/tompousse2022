<article class="card-article">
    <a href="<?php the_permalink(); ?>" class="card-article__img-container">
        <?php the_post_thumbnail("medium"); ?>
    </a>
    <h3 class="card-article__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    <a href="<?php the_permalink(); ?>" class="link-basic">Lire l'article</a>
</article>