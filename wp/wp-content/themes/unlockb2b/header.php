<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Braftonium
 * @since Braftonium Theme 1.0
 */
?>
<!doctype html>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">

		<?php // force Internet Explorer to use the latest rendering engine available ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title( '|', true, 'right' ); ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-touch-icon.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">
		<meta name="theme-color" content="#121212">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php // WordPress head functions ?>
		<?php wp_head(); ?>
		<?php // end of WordPress head
		$nav = get_field('navigation_bar_position', 'option');
		$banner_style = get_field('banner_style', 'option');
		$logo1 = esc_url(get_theme_mod( 'braftonium_logo' ));
		$logo2 = esc_url(get_site_icon_url());

		$description = get_bloginfo( 'description', 'display' );
		echo '<script type="application/ld+json">
			{
				"@context": "http://schema.org/",
				"@type": "Organization",
				"name": "'.get_bloginfo( "name" ).'",
				"legalName": "'.get_bloginfo( "name" ).'",
				"url": "'.network_site_url( '/' ).'",
				"description": "'.$description.'"
			}
		</script>';
		if(is_single()) {
			$content = wp_strip_all_tags(apply_filters('the_content', $post->post_content)); 
			$excerpt = wp_strip_all_tags(apply_filters('the_excerpt', $post->post_excerpt)); 
			$image_url = get_theme_mod( 'braftonium_logo' );
			$author = $post->post_author; 
			echo '<script type="application/ld+json">
				{ "@context": "http://schema.org",
				"@type": "BlogPosting",
				"headline": "'.esc_html( get_the_title() ).'",
				"image": "'.get_the_post_thumbnail_url().'",
				"wordcount": "'.str_word_count($content,0).'",
				"publisher": {
				"@type": "Organization",
				"name": "'.get_bloginfo( "name" ).'",
				"logo": "'.$image_url.'"
				},
				"url": "'.get_permalink().'",
				"datePublished": "'.get_the_date('Y-m-d').'",
				"description": "'.$excerpt.'",
				"author": {
				"@type": "Person",
				"name": "'.get_the_author_meta( "user_nicename" , $author ).'"
				}
				}
			</script>';
		}
		?>
		<!-- linkedin --> 
		<script type="text/javascript">

_linkedin_partner_id = "2191577";

window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];

window._linkedin_data_partner_ids.push(_linkedin_partner_id);

</script><script type="text/javascript">

(function(){var s = document.getElementsByTagName("script")[0];

var b = document.createElement("script");

b.type = "text/javascript";b.async = true;

b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";

s.parentNode.insertBefore(b, s);})();

</script>
		<!-- Hotjar Tracking Code for https://unlockb2b.com/ -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1919757,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-MDL4PV3');</script>

<!-- End Google Tag Manager -->
	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<noscript>

<img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=2191577&fmt=gif" />

</noscript><!-- Google Tag Manager (noscript) -->

<noscript><iframe 

height="0" width="0" style="display:none;visibility:hidden" data-src="https://www.googletagmanager.com/ns.html?id=GTM-MDL4PV3" class="lazyload" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="><noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDL4PV3"

height="0" width="0" style="display:none;visibility:hidden"></noscript></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->
		<div id="container">

			<header class="header" itemscope itemtype="http://schema.org/WPHeader">
				<?php if (is_page_template('full-width.php')){ ?>
					<a class="skip-link" href="#content">Skip to content</a>
				<?php } else { ?>
					<a class="skip-link" href="#inner-content">Skip to content</a>
				<?php }?>
				<div id="inner-header" class="<?php if (!$logo1 && !$nav=='next') : echo 'auto '; endif; ?> cf container">
					<div class="wrap">
						<div id="logo" class="h1" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow" name='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
						<?php if ($logo1&&$logo2): ?>
							<img src='<?php echo $logo1; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="site-title">
							<img src='<?php echo $logo2; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="scrolled-title">
						<?php elseif ($logo1): ?>
							<img src='<?php echo $logo1; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="site-title" style="display: inline">
						<?php else: ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="214" height="74" viewBox="0 0 214 74">
							<g fill="none" fill-rule="nonzero">
								<path fill="#2F2F2F" d="M101.304 22.02v18.845c0 3.131-.983 5.607-2.948 7.428-1.966 1.821-4.652 2.732-8.058 2.732-3.353 0-6.015-.885-7.988-2.653-1.972-1.769-2.978-4.2-3.017-7.29V22.018h5.917v18.885c0 1.874.45 3.24 1.35 4.098.902.858 2.147 1.287 3.738 1.287 3.327 0 5.017-1.743 5.07-5.228V22.02h5.936zm9.724 7.349l.177 2.456c1.526-1.9 3.57-2.849 6.135-2.849 2.261 0 3.944.662 5.049 1.985 1.104 1.323 1.67 3.301 1.696 5.934v13.737h-5.7V37.033c0-1.205-.263-2.08-.79-2.623-.525-.544-1.4-.816-2.622-.816-1.604 0-2.808.681-3.61 2.044v14.994h-5.7V29.369h5.365zm23.668 16.527h12.564v4.736h-18.48V22.019h5.916v23.877zm14.694-6.092c0-2.11.408-3.99 1.223-5.64.815-1.65 1.989-2.928 3.52-3.832 1.533-.904 3.311-1.356 5.336-1.356 2.88 0 5.23.878 7.051 2.633 1.821 1.756 2.837 4.14 3.048 7.153l.04 1.454c0 3.263-.915 5.88-2.742 7.851-1.828 1.972-4.28 2.958-7.357 2.958s-5.533-.983-7.367-2.948c-1.834-1.965-2.752-4.638-2.752-8.018v-.255zm5.7.412c0 2.018.382 3.56 1.144 4.628.763 1.068 1.854 1.602 3.275 1.602 1.38 0 2.458-.527 3.234-1.582.776-1.055 1.164-2.741 1.164-5.06 0-1.978-.388-3.511-1.164-4.599-.776-1.087-1.867-1.63-3.274-1.63-1.394 0-2.472.54-3.235 1.62-.762 1.081-1.143 2.755-1.143 5.021zm26.904 6.23c1.051 0 1.906-.288 2.564-.865.657-.576.999-1.343 1.025-2.299h5.345a7.266 7.266 0 0 1-1.183 3.96c-.776 1.198-1.838 2.129-3.185 2.79-1.348.662-2.837.993-4.468.993-3.05 0-5.457-.967-7.219-2.899-1.762-1.932-2.643-4.602-2.643-8.008v-.373c0-3.275.875-5.889 2.624-7.841 1.748-1.952 4.148-2.928 7.199-2.928 2.669 0 4.809.757 6.42 2.27 1.61 1.513 2.429 3.527 2.455 6.042h-5.345c-.026-1.1-.368-1.994-1.025-2.682-.658-.688-1.526-1.032-2.604-1.032-1.328 0-2.33.482-3.008 1.445-.677.963-1.016 2.525-1.016 4.687v.59c0 2.187.336 3.759 1.006 4.715.671.957 1.69 1.435 3.058 1.435zm19.94-4.343l-2.051 2.044v6.485h-5.7V20.447h5.7v16.724l1.104-1.415 5.464-6.387h6.844l-7.712 8.863 8.382 12.4h-6.548l-5.483-8.529z"/>
								<path fill="#4D8073" d="M65.204 18.617c-.704-1.246-1.799-2.337-3.128-3.116L37.684 1.48C36.354.701 34.947.312 33.462.312v36.61l31.742-18.305z"/>
								<path fill="#266A5E" d="M65.204 55.227c.703-1.246 1.172-2.726 1.172-4.206V22.823c0-1.48-.39-2.96-1.172-4.206L33.462 36.922l31.742 18.305z"/>
								<path fill="#7EA5AB" d="M33.462 36.922v36.61c1.485 0 2.893-.389 4.222-1.168l24.47-14.099a8.554 8.554 0 0 0 3.128-3.116l-31.82-18.227z"/>
								<path fill="#4C9645" d="M1.642 55.227c.703 1.247 1.798 2.337 3.127 3.116l24.471 14.1c1.33.778 2.736 1.168 4.222 1.168V37L1.642 55.227z"/>
								<path fill="#92C741" d="M1.642 18.617C.938 19.863.469 21.343.469 22.823v28.12c0 1.48.391 2.96 1.173 4.206l31.82-18.305-31.82-18.227z"/>
								<path fill="#287A3E" d="M4.77 15.501a8.554 8.554 0 0 0-3.128 3.116l31.82 18.305V.312c-1.486 0-2.893.39-4.222 1.168L4.77 15.501z"/>
								<path fill="#FFF" d="M31.35 21.733l-10.085 5.842c-1.25.7-2.11 2.103-2.11 3.583v11.606c0 1.48.781 2.882 2.11 3.583l10.086 5.842c1.25.702 2.893.702 4.144 0l10.085-5.842c1.25-.7 2.11-2.103 2.11-3.583V31.08c0-1.48-.78-2.882-2.11-3.583l-10.085-5.842c-1.251-.701-2.815-.701-4.144.078z"/>
								<path fill="#245348" d="M34.4 35.442c.704-.234 1.33-.623 1.72-1.324.625-1.09.625-2.57-.235-3.505a3.085 3.085 0 0 0-4.925 0 3.183 3.183 0 0 0-.235 3.505c.391.7 1.017 1.09 1.72 1.324l-1.798 7.945c-.156.546.313 1.013.86 1.013h3.831c.547 0 .938-.545.86-1.013L34.4 35.442z"/>
							</g>
						</svg>
						
						<?php endif; ?></a></div>

						<div class="nextwidget">
							<?php if ( is_active_sidebar( 'header-sidebar' ) ) {
								dynamic_sidebar( 'header-sidebar' );
							} ?>
							<button id="menu-toggle" class="menu-toggle blue-btn"><?php _e( 'Menu', 'braftonium' );
							echo braftonium_get_svg_path('icon-bars').braftonium_get_svg_path('icon-close'); ?></button>	

						</div>

						<nav class="<?php if ($nav): echo sanitize_text_field ($nav); else: echo 'below'; endif; ?>" itemscope itemtype="http://schema.org/SiteNavigationElement">
							<?php wp_nav_menu(array(
								'container' => false,                           // remove nav container
								'container_class' => 'menu cf',                 // class of container (should you choose to use it)
								'menu' => __( 'The Main Menu', 'braftonium' ),  // nav name
								'menu_class' => 'nav top-nav cf',               // adding custom nav class
								'theme_location' => 'main-nav',                 // where it's located in the theme
								'before' => '',                                 // before the menu
								'after' => '',                                  // after the menu
								'link_before' => '',                            // before each link
								'link_after' => '',                             // after each link
								'depth' => 0,                                   // limit the depth of the nav
								'fallback_cb' => ''                             // fallback function (if there is one)
							)); ?>
						</nav>
					</div>
				</div>
				
				<?php if (is_single() && has_post_thumbnail()) : ?>
					<section class="banner visual<?php if ($banner_style == 'sinistral'): echo ' sinistral'; endif; ?>"<?php echo ' style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(),'full').')"'; ?>>
					<?php if ($banner_style == 'sinistral'): ?>
						<div class="wrap"><div class="black">
					<?php else: ?>
						<div class="black"><div class="wrap">
					<?php endif; ?>
							
							<h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
							<p class="byline entry-meta vcard">
								<?php printf( __( 'Posted', 'braftonium' ).' %1$s',
									/* the time the post was published */
									'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>'
									/* the author of the post */
									// '<span class="by">'.__( 'by', 'braftonium' ).'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
								);
								?>
								<?php //printf( __( 'filed under', 'braftonium' ).': %1$s', get_the_category_list(', ') ); ?>
								<?php //the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'braftonium' ) . '</span> ', ', ', '</p>' );
								if (function_exists('braftonium_social_sharing_buttons')): braftonium_social_sharing_buttons(); endif;  ?>
							</p>
						</div></div>
					</section>
				<?php endif;
				if(is_home()):
					$blog_page_id = get_option( "page_for_posts" );
					$background_image = esc_url(get_field('background_image',$blog_page_id));
					$title = wp_kses_post(get_field('title',$blog_page_id));
					$tagline = wp_kses_post(get_field('tagline',$blog_page_id));
				elseif(is_archive()):
					$term = get_queried_object()->cat_ID;
					$background_image = esc_url(get_field('background_image', 'category_'.$term));
					if(get_field('title','category_'. $term)): $title = wp_kses_post(get_field('title','category_'. $term)); else: $title = get_the_archive_title(); endif;
					$tagline = wp_kses_post(get_field('tagline','category_'. $term));
				elseif(!is_page_template( 'full-width.php' )&&!is_page_template( 'resources.php' ) ):
					$background_image = esc_url(get_field('background_image'));
					$title = wp_kses_post(get_field('title'));
					$tagline = wp_kses_post(get_field('tagline'));
				endif;
				if ($background_image) : ?>
					<section class="banner visual<?php if ($banner_style == 'sinistral'): echo ' sinistral'; endif; ?>"<?php echo ' style="background-image:url('.$background_image.')"'; ?>>
					
					<?php if ($banner_style == 'sinistral'): ?>
						<div class="wrap"><div class="black">
					<?php else: ?>
						<div class="black"><div class="wrap">
					<?php endif; ?>
					
							<?php if ($title): echo '<h1 class="page-title" itemprop="headline">'.$title.'</h1>'; endif; ?>
							<?php if ($tagline): echo $tagline; endif; ?>
						</div></div>
					</section>
				<?php endif; ?>
			</header>
