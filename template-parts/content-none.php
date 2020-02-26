<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>


<div class="page-header">
	<?php echo ( '<h1> Search </h1>' ); ?>
</div>

<div class="entry-content">

	<?php if ( is_search() ) : ?>
		<?php get_search_form(); ?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', '' ); ?></p>
		
	<?php else : ?>
		<?php get_search_form(); ?>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '' ); ?></p>
		
	<?php endif; ?>
</div>

