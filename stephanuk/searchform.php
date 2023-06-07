<form class="search-form" action="<?php echo esc_url( home_url()) ?>" method="get">
    <input type="text" name="s" id="search" placeholder="<?php echo esc_attr__('Type to search', 'trydus') ?>" value="<?php the_search_query(); ?>" />
    <button type="submit"><i class="fa fa-search"></i></button>
</form>