<?php
/**
 * The template for displaying all single posts - News article
 */
get_header(); ?>
	<section class="container clearfix">
		<div class="inner clearfix">
			<article class="main-content clearfix">
				<div class="breadcrumbs clearfix">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb();
						}
					?>
				</div>
				<?php while ( have_posts() ) : the_post();?>
					<div class="page-header">
						<?php the_title( '<h1>', '</h1>' ); ?>
					</div>
					<div class="article-info"><?php echo get_the_date( 'd M Y' ); ?></div>
					<div class="entry-content">
						<?php the_content();?>
					</div>
				<?php endwhile;?>
			</article>

			<?php if ( is_active_sidebar( 'sidebar' )  ) : ?>
				<aside  class="left">
					<?php dynamic_sidebar( 'sidebar' ); ?>
				</aside>
			<?php endif; ?>
		</div>
	</section>
<?php get_footer(); ?>
