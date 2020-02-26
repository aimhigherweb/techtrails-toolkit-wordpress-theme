<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>
	<section class="container">
		<?php while ( have_posts() ) : the_post();?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		<?php endwhile;?>
	</section>
<?php get_footer(); ?>
