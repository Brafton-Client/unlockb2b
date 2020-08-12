<?php
if(!session_id()) session_start();
/*
 Template Name: Full Width
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
$banner_style = get_field('banner_style', 'option');
$background_image = esc_url(get_field('background_image'));
$title = wp_kses_post(get_field('title'));
$tagline = wp_kses_post(get_field('tagline'));
?>

<?php get_header(); ?>

	<div id="content" class="hentry">
		<div id="inner-content" class="cf">
			<main id="main" class="m-all t-all d-all cf" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
			<?php $sectionrow=0;
			if ($background_image||$title||$tagline) :
			$background_image_id = attachment_url_to_postid($background_image);
			$background_image_alt = "";
			if($background_image_id){
				$background_image_alt = get_post_meta($background_image_id, '_wp_attachment_image_alt', true);
			}
			?>
				<section class="banner visual poly<?php if ($banner_style == 'sinistral'): echo ' sinistral'; endif; ?>"<?php if ($background_image): echo ' style="background-image:url()"'; endif; ?>>
					<div class="hexagon-background-image">
						<img src="<?php echo $background_image; ?>" alt="<?php echo $background_image_alt; ?>"/>
					</div>
					<?php if ($banner_style == 'sinistral'): ?>
						<div class="wrap"><div class="black">
					<?php else : ?>
						<div class="black"><div class="wrap">
					<?php endif; ?>
						<?php if ($title): echo '<h1 class="page-title" itemprop="headline">'.$title.'</h1>'; endif; ?>
						<?php if ($tagline): echo $tagline; endif; ?>
					</div></div>
					<div class="polygon">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/lock-green.png" alt="Neon green keyhole symbol outlined"/>
					</div>
				</section>
			<?php $sectionrow++;
			endif; // check if the flexible content field has rows of data ?>
				<?php if( have_rows('content') ):
					// loop through the rows of data
					while ( have_rows('content') ) : the_row();
						$row_layout = get_row_layout();
						get_template_part('library/blocks/full-width/components/'.$row_layout.'/content', $row_layout.'.html');
						$sectionrow++;
					endwhile;
				endif; ?>
				<?php if(get_field('default_content')){?>
				<div class="wrap">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<?php if( get_the_content() ): ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> itemscope itemtype="http://schema.org/BlogPosting">

								<?php if( get_the_title()&&!have_rows('content') ): ?>
									<header class="article-header">
										<h1 class="page-title"><?php the_title(); ?></h1>
									</header>
								<?php endif; ?>

								<section class="entry-content cf" itemprop="articleBody">
									<?php the_content(); ?>
								</section>
							</article>
						<?php endif; ?>
					<?php endwhile; else : ?>

						<article id="post-not-found" class="hentry cf">
							<header class="article-header">
							
								<h1><?php _e( 'Oops, Post Not Found!', 'braftonium' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'braftonium' ); ?></p>
							</section>
							<footer class="article-footer">
								<p><?php //_e( 'This is the error message in the full-width.php template.', 'braftonium' ); ?></p>
							</footer>
						</article>

					<?php endif; ?>
				</div>
				<?php } ?>
			</main><!-- //main -->

		<?php get_sidebar(); ?>

		</div><!-- //inner-content -->

	</div><!-- //content -->

<?php get_footer(); ?>
