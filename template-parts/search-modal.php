<div class="search-modal" :class="{active: searchModal}">
    <div class="search-modal__container">
        <p class="section-title">Rechercher</p>
        <form action="/" method="get">
            <input ref="inputSearchModal" type="text" placeholder="Titre, collection, auteur(e)…" name="s" id="input-search-modal" />
            <input type="submit" value="Rechercher">
        </form>
        <ul class="liste-thematiques">
            <?php
            $args = [
            	"taxonomy" => "thematiques",
            	"parent" => 0,
            ];
            $thematiques = get_terms($args);
            foreach ($thematiques as $thematique):
            	$name = $thematique->name;
            	$count = $thematique->count;
            	$link = get_term_link($thematique->term_id);

            	echo '<li><a class="link-arrow" href="' .
            		$link .
            		'">' .
            		$name .
            		"</a></li>";
            endforeach;
            ?>
        </ul>
    </div>
    <div class="btn-close__container">
        <button class="btn-close" @click="searchModal = false"></button>
    </div>
    <div class="background"></div>
</div>