<?php
/**
 * The template part for displaying results in search pages
 */
?>


<div class="result-title">
	<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
</div>
<div class="result-text">
	<?php the_excerpt(); ?>
</div>
<div class="result-created"> 
	Created on <?php echo get_the_date( 'd M Y' ); ?>
</div>
<hr>
