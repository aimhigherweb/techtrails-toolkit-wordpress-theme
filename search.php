<?php
/**
 * The template for displaying search results pages
 */

get_header(); ?>

	<section class="container clearfix">
		<div  class="inner clearfix">
			<article class="main-content clearfix">

				<div class="breadcrumbs clearfix">
					<?php
						if ( function_exists('yoast_breadcrumb') ) {
							yoast_breadcrumb();
						}
					?>
				</div>
				<?php if ( have_posts() ) : ?>
					<div class="page-header">
						<?php echo ( '<h1> Search </h1>' ); ?>
					</div>

					<?php get_search_form(); ?>
					<div class="search-results">
						<?php while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'search' );
						endwhile;?>
					</div>
					<?php
					// Previous/next page navigation.
					the_posts_pagination( array(
						'prev_text'          => __( 'Previous page', '' ),
						'next_text'          => __( 'Next page', '' ),
						'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', '' ) . ' </span>',
					) );

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;?>
			</article>
		</div>
	</section>

<?php get_footer(); ?>
