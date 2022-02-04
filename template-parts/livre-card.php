<?php
    $couverture = get_field('couverture');
    $size = 'medium';
    $not_book = get_field('not-book');
    $couleur = get_field('couleur_principale');
?>
<a href="<?php the_permalink(); ?>" class="livre-card<?php if($not_book){echo ' is-not-book';} ?>">
    <img 
        src="<?= $couverture['sizes']['medium']; ?>" 
        alt="<?php the_title(); ?>" 
        srcset="<?= $couverture['sizes']['xl'] . ' ' . $couverture['sizes']['xl-width'] . 'w, ' .
            $couverture['sizes']['large'] . ' ' . $couverture['sizes']['large-width'] . 'w, ' .
            $couverture['sizes']['medium_large'] . ' ' . $couverture['sizes']['medium_large-width'] . 'w'; ?>"
        sizes="(max-width: 1024px) 100vw,
            30vw"
        loading="lazy"
    >    
    <div class="background" style="background-color:<?= $couleur; ?>"></div>
</a>