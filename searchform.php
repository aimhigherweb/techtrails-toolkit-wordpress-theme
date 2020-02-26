<?php
/**
 * Template for displaying search forms
 */
?>

<form  id="searchForm" role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
	<input  id="search-searchword" type="text" class="search-field"   placeholder="<?php echo esc_attr_x( 'Search Keyword:', 'placeholder', '' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	
	<button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', '' ); ?></span></button>
</form>
