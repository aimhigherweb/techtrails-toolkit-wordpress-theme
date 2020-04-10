<?php

function subject_areas_shortcode($atts = [], $content = null) {
	ob_start();

	?>

		<div class="subject-areas">

			<?php

				query_posts(array(
					'numberposts' => 4,
					'post_type'   => 'subject'
				));

				if ( have_posts() ) : 
					while ( have_posts() ) : the_post();
						$image = get_field('featured_image')
					?>

						<a href="/subject/<?php the_field('code'); ?>">
							<figure class="subject" style="--subjectBackground:<?php the_field('colour'); ?>">
								<img src="<?php echo esc_url($image['sizes']['large']); ?>" />
								<figcaption><?php the_title(); ?></figcaption>
								<div class="desc"><?php the_content(); ?></div>
							</figure>
						</a>

					<?php endwhile;

				endif;

			?>

		</div>

	<?php

	$content = ob_get_clean();

	return $content;
  }

  add_shortcode('subject_areas', 'subject_areas_shortcode');


?>