</div> <!-- End of wrap -->

<footer class="footer">
	<div class="inner">

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social mb-md-2">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'social',
						'menu_class'     => 'nav menu',
					) );
				?>
			</nav>
		<?php endif; ?>

		<div class="row no-gutters">
			<div class="col-md-6 col-sm-12 mb-sm-3 mb-md-0">
				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav class="footer-nav">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'footer',
								'menu_class'     => 'nav menu',
							) );
						?>
					</nav>
				<?php endif;?>
			</div>
			<div class="col-md-6 col-sm-12 text-md-right">
				<a class="dash" rel="nofollow noopener noreferrer" href="https://www.dashdigital.com.au" target="_blank"><span class="sr-only">Website by Dash Digital</span></a>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
