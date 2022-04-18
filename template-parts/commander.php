<div class="modal-commander" :class="{active: commanderModal}">
    <div class="distributeurs">
        <p class="distributeurs__title section-title">Commander sur :</p>
        <ul class="distributeurs__list">

            <?php if (get_field("hoptoys")): ?>
            <li class="distributeurs__item">
                <a href="<?php the_field("hoptoys"); ?>" target="_blank">
                    <img src="<?= get_template_directory_uri() ?>/src/img/commander/hoptoys.jpg" alt="Commander sur Hoptoys">
                </a>
            </li>
            <?php endif; ?>

            <?php if (get_field("place_des_libraires")): ?>
            <li class="distributeurs__item">
                <a href="<?php the_field(
                	"place_des_libraires"
                ); ?>" target="_blank">
                    <img src="<?= get_template_directory_uri() ?>/src/img/commander/place-des-libraires.jpg" alt="Commander sur Place des libraires">
                </a>
            </li>
            <?php endif; ?>

            <?php if (get_field("amazon")): ?>
            <li class="distributeurs__item">
                <a href="<?php the_field("amazon"); ?>" target="_blank">
                    <img src="<?= get_template_directory_uri() ?>/src/img/commander/amazon.jpg" alt="Commander sur Amazon">
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (get_field("fnac")): ?>
            <li class="distributeurs__item">
                <a href="<?php the_field("fnac"); ?>" target="_blank">
                    <img src="<?= get_template_directory_uri() ?>/src/img/commander/fnac.jpg" alt="Commander sur Fnac">
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (get_field("lalibrairie")): ?>
            <li class="distributeurs__item">
                <a href="<?php the_field("lalibrairie"); ?>" target="_blank">
                    <img src="<?= get_template_directory_uri() ?>/src/img/commander/lalibrairie.png" alt="Commander sur lalibrairie.com">
                </a>
            </li>
            <?php endif; ?>
            
            <?php if (get_field("librairies_independantes")): ?>
            <li class="distributeurs__item">
                <a href="<?php the_field("librairies_independantes"); ?>" target="_blank">
                    <img src="<?= get_template_directory_uri() ?>/src/img/commander/librairies-independantes.png" alt="Commander sur Librairies Indépendantes">
                </a>
            </li>
            <?php endif; ?>

            <?php if (get_field("mot_a_mot")): ?>
            <li class="distributeurs__item">
                <a href="<?php the_field("mot_a_mot"); ?>" target="_blank">
                    <img src="<?= get_template_directory_uri() ?>/src/img/commander/mot-a-mot.jpg" alt="Commander sur Mot a mot">
                </a>
            </li>
            <?php endif; ?>
    
            <?php if (get_field("decitre")): ?>
            <li class="distributeurs__item">
                <a href="<?php the_field("decitre"); ?>" target="_blank">
                    <img src="<?= get_template_directory_uri() ?>/src/img/commander/decitre.jpg" alt="Commander sur Decitre">
                </a>
            </li>
            <?php endif; ?>

        </ul>
    </div>
    <div class="btn-close__container">
        <button class="btn-close" @click="commanderModal = false"></button>
    </div>
    <div class="background"></div>
</div>