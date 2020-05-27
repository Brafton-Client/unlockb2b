			<footer class="footer" itemscope itemtype="http://schema.org/WPFooter">
				<div id="inner-footer" class="wrap cf">
					<section><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo">
						<?php if ( get_theme_mod( 'braftonium_footerlogo' ) ):
							$footer_logo = esc_url(get_theme_mod( 'braftonium_footerlogo' ));
						elseif ( get_theme_mod( 'braftonium_logo' ) ):
							$footer_logo = esc_url(get_theme_mod( 'braftonium_logo' ));
						endif;
						if (isset($footer_logo)): ?>
							<img src='<?php echo $footer_logo; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
						<?php else: ?>
							<p><?php bloginfo( 'name' ); ?></p>
						<?php endif; ?>
					</a></section>
					
					<?php if ( is_active_sidebar( 'footer-left' ) ){
						echo '<section>';
						dynamic_sidebar( 'footer-left' );
						echo '</section>';
					}
					if(is_active_sidebar( 'footer-middle' )){
						echo '<section>';
						dynamic_sidebar( 'footer-middle' );
						echo '</section>';
					}
					if(is_active_sidebar( 'footer-right' )){
						echo '<section>';
						dynamic_sidebar( 'footer-right' );
						echo '</section>';
					} ?>
					
					<?php if (has_nav_menu('social')):
					echo '<section>';
						wp_nav_menu( array(
							'theme_location' => 'social',
							'menu_class'	=> 'social-navigation',
							'container'		=> '',
							'walker'		=> new Social_Nav_Menu(),
						) );
						if ( is_active_sidebar( 'footer-last' )):
							dynamic_sidebar( 'footer-last' );
						endif;
						echo '</section>';
					endif; ?>
				</div>
				<div class="copyright"><p class="source-org wrap">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p></div>
			</footer>

		</div>
		<?php wp_footer(); ?>

	</body>

</html>
