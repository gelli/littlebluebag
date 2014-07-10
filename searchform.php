<form role="search" method="get" class="navbar-form navbar-right" action="<?php  esc_url( home_url( '/' ) ) ?>">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="<?php esc_attr_x( 'Search &hellip;', 'placeholder' ) ?>" value="<?php get_search_query() ?>" name="s" title="<?php esc_attr_x( 'Search for:', 'label' ) ?>" />
    </div>
    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
</form>