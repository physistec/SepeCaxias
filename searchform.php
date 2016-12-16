<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <fieldset>
        <input class="search-field" type="text" placeholder="Buscar…" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
        <input class="search-button" type="image" alt="Buscar" src="<?php bloginfo( 'template_url' ); ?>/images/search-icon.jpg" />
    </fieldset>
</form>