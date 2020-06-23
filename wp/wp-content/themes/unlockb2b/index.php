<?php get_header();
$layout = sanitize_text_field(get_field('blog_layout', 'option'));
if (!$layout): $layout = 'hero'; endif;
$layoutarray = array('full','rich','simple');
$blog_page_id = get_option( "page_for_posts" );
$background_image = esc_url(get_field('background_image',$blog_page_id));
add_filter( 'excerpt_more', function($link){
return '';
} );
add_filter('excerpt_length', function($length){
return 25;
});
$count = 0;
if ($layout == 'simple' && have_posts()) {
	while (have_posts()) {
	  the_post(); 
	  ++$count;?>
	  	<div class="simple wrap container"><div class="thumbnail" style="background-image:url('<?php get_the_post_thumbnail_url(get_the_ID(),'full'); ?>')"><a href="'<?php echo get_the_permalink(); ?>'"  title="'<?php echo the_title_attribute( 'echo=0' ); ?>'"></a></div>
		<div class="content"><header class="article-header">
		<p class="byline entry-meta vcard"><strong>
			<?php printf( __( 'By', 'braftonium' ).' %1$s %2$s',
				/* the author of the post */
				'<span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . ' | </span>',
				/* the time the post was published */
				'<a href="'. get_the_permalink().'"><time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time></a>'
			); 
			if (function_exists('braftonium_social_sharing_buttons')):
				braftonium_social_sharing_buttons();
			endif; ?>
		</strong></p>
		<h2 class="h3 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
	</header>

	<section class="entry-content cf">
		<?php the_excerpt(); ?>
	</section></div></div>
	<?php break;
	}
  }
?>
			<div id="content">
				<div id="inner-content" class="wrap cf">
				<?php get_sidebar(); ?>
					<main id="main" class="m-all <?php if(is_active_sidebar('blog-sidebar')): echo ''; endif; ?> cf<?php echo ' '.$layout; ?>" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<?php if (!$background_image && !$layout == 'simple'): ?><header class="article-header hentry">
							<h1 class="page-title" itemprop="headline"><?php echo get_the_title( $blog_page_id ); ?></h1>
						</header><?php endif;// end article header ?>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ++$count; ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?>>
								<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
									if ($layout == 'rich'):
										echo '<div class="thumbnail" style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(),'full').')"></div>';
									elseif (in_array($layout, $layoutarray)):
										echo '<div class="thumbnail">';
											echo '<a href="'. get_the_permalink().'"  title="'. the_title_attribute( 'echo=0' ) .'">';
											the_post_thumbnail($size);
											echo '</a>';
										echo '</div>';
									else:
										echo '<div class="thumbnail">';
											the_post_thumbnail($size);
										echo '</div>';
									endif;
								} ?>
								<div class="content">
									<header class="article-header">
										<h2 class="h3 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
										<p class="byline entry-meta vcard">
											<?php if ($layout == 'simple'):
												echo '<strong>';
												printf( __( 'By', 'braftonium' ).' %1$s %2$s',
													/* the author of the post */
													'<span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span> | ',
													/* the time the post was published */
													'<a href="'. get_the_permalink().'"><time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time></a>'
												); 
												if (function_exists('braftonium_social_sharing_buttons')):
													braftonium_social_sharing_buttons();
												endif; 
												echo '</strong>';
											else:
												printf( __( 'Posted', 'braftonium' ).' %1$s %2$s',
													/* the time the post was published */
													'<a href="'. get_the_permalink().'"><time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time></a>',
													/* the author of the post */
													'<span class="by">'.__( 'by', 'braftonium').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
												); 
												if (function_exists('braftonium_social_sharing_buttons')):
													braftonium_social_sharing_buttons();
												endif; 
											endif; ?>
										</p>
									</header>

								<section class="entry-content cf">
									<?php the_excerpt(); ?>
								</section></div>

							</article>
						<?php endwhile;  if($count % 2){ ?> <article class="empty"></article> <?php };?>

							<?php braftonium_page_navi(); ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
								<header class="article-header">
									<h1><?php _e( 'Oops, Post Not Found!', 'braftonium' ); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'braftonium' ); ?></p>
								</section>
								<footer class="article-footer">
									<p><?php // _e( 'This is the error message in the index.php template.', 'braftonium' ); ?></p>
								</footer>
							</article>

						<?php endif; ?>
					</main>

					
				</div>
			</div>

<?php get_footer(); ?>