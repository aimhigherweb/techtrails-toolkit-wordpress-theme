<?php
/**
 * The template for displaying archive pages - News archive
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
				<div class="blog clearfix">
					<?php if ( have_posts() ) :?>
						<?php	while ( have_posts() ) : the_post();?>

							<div  class="blog-item">
								<div class="blog-header">
									<h2> <a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h2>
								</div>
								<div class="article-info">
									<?php echo get_the_date( 'd M Y' ); ?>
								</div>

								<div class="blog-content">
									<?php the_content( '$more_link_text', TRUE ); ?>
								</div>
							</div>
						<?php endwhile;

					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', 'twentysixteen' ),
						'next_text'          => __( 'Next page', 'twentysixteen' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
					) );
				endif; ?>
				</div>
		</article>

		<?php if ( is_active_sidebar( 'sidebar' )  ) : ?>
			<aside  class="left">
				<?php dynamic_sidebar( 'sidebar' ); ?>
			</aside>
		<?php endif; ?>
		</div>
	</section>
<?php get_footer(); ?>



