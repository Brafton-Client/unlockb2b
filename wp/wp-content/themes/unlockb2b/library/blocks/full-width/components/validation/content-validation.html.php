<?php
/**
 * The template used for displaying slider section of page.
 *
 * @package WordPress
 * @subpackage Braftonium
 * @since braftonium 1.0
 */
global $sectionrow;
$title = wp_kses_post(get_sub_field('title'));
if ($title):
	$titletext = ($sectionrow==0)?'<h1>'.$title.'</h1>':'<h2>'.$title.'</h2>';
endif;

$list_type = get_sub_field('list_type');
	if ($list_type=='custom'): $custom = get_sub_field('custom_list'); endif;
	if ($list_type=='recent'): $recent = sanitize_text_field(get_sub_field('recent')); $number = intval(get_sub_field('number_of_posts')); endif;
	if ($list_type=='manual'): $manual = get_sub_field('manual'); endif;
	if ($list_type=='first'): $first = get_sub_field('first'); endif;
$showbutton	 = get_sub_field('read_more_button');
$style = get_sub_field('style');
$imagestyle	 = get_sub_field('image_size_and_shape');
$classes = array('validation');
if ($style['add_class']){
	$classes[] = sanitize_html_classes($style['add_class']);
}
if (!$style['background_image'] && !$style['background_color'] ) {
	$classes[] = "gradient";
}
if ( $style['other'] ) {
	if (in_array('full', $style['other'])){
		$classes[] = "full";
	}
	if (in_array('compact', $style['other'])){
		$classes[] = "compact";
	}
	if (in_array('center', $style['other'])){
		$classes[] = "center";
	}
}

braftonium_slick_script();

if( is_array($imagestyle)):
	if( in_array('thumb', $imagestyle) ): $size = 'thumbnail'; endif;
	if( in_array('square', $imagestyle) ): $size = 'mediumsquared'; endif;
	if( in_array('full', $imagestyle) ): $size = 'full'; endif;
endif;
?>

<section id="post-<?php the_ID(); echo '-'.$sectionrow; ?>" class="<?php echo implode(' ',$classes); ?>" style="<?php
if ( $style['background_image'] ) { echo 'background-image: url(' . esc_url($style['background_image']) . ');'; }
if ( $style['background_color'] ) { echo 'background-color: ' . sanitize_hex_color($style['background_color']) . ';'; }
if ( $style['color'] ) { echo 'color: ' . sanitize_hex_color($style['color']) . ';'; } ?>" >
<?php if ($titletext): echo $titletext; endif; ?>
	<div class="wrap">

		<?php
		echo '<div class="slick">';
		if ( $custom ) :
			foreach( $custom as $item ):
				if ($item['button']){
					$url = esc_url($item['button']['url']);
					$text = sanitize_text_field($item['button']['text']);
				}
			?>
				<div class="list-item"><?php
				if ( !$showbutton ):'<a href="'.$url.'"">'; endif;
					if ( $item['image'] ):
						echo '<div class="image">';
							if ( is_array($imagestyle) && in_array('round', $imagestyle) ):
								echo wp_get_attachment_image( $item['image'], $size, "", ["class" => "round"] );
							else:
								echo wp_get_attachment_image( $item['image'], $size );
							endif;
						echo '</div>';
					endif;
				if ( !$showbutton ):'</a>'; endif;

				if ( $item['title'] ):
					echo '<div class="text">';
					echo '<h3>';
					 if ($url): echo '<a href="'.$url.'">'; endif;
					 $titlestring = sanitize_text_field($item['title']);
					 if (strlen($titlestring) > 65){
						 $titlestring = implode(' ', array_slice(explode(' ', $titlestring), 0, 10)).'...';
					 }
					 echo $titlestring.'</a></h3>';
					 echo '</div>';
				endif;

				if ( $item['content'] ): echo wp_kses_post($item['content']); endif;

				if ( $showbutton ): echo '<a href="'.$url.'" class="button">';
					if($text): echo $text;
					else: _e('Read More', 'braftonium');
					endif;
					echo '</a>';
				endif;
				echo '</div><!-- //list-item -->';
			endforeach;
			
		elseif ( $recent ):
			$recent_query = new WP_Query(
				array( 
					'post_type' => $recent,
					'showposts' => $number
				)
			);
			while ($recent_query->have_posts()) : $recent_query->the_post();
				$name = get_field('name', $post);
				$position = get_field('position', $post);
				$company = get_field('company', $post);
				$location = get_field('location', $post);
				$website = get_field('website', $post); ?>
				<div class="list-item"><?php if ( $name || $position || $company || $location || $website) { echo '<div class="testimonial">'; } ?>
					<?php if ( $imagestyle && in_array('round', $imagestyle) && has_post_thumbnail() ){
						?><div class="image"><?php
						 the_post_thumbnail($size, ['class' => 'round']);
						 ?></div><?php
					} elseif( has_post_thumbnail()){
						?><div class="image"><?php
						the_post_thumbnail($size);
						?></div><?php
					}
					?>
						<div class="text"><h3><a href="<?php the_permalink() ?>"><?php
						$titlestring = get_the_title($post);
						if (strlen($titlestring) > 65){
							$titlestring = implode(' ', array_slice(explode(' ', $titlestring), 0, 10)).'...';
						}
						echo $titlestring;
						?></a></h3>
					<?php
						echo '<p>';
						$content= get_the_content();
						$the_excerpt= substr($content,0,strpos($content,'.')+1);
						if (strlen($the_excerpt) > 100){
							echo implode(' ', array_slice(explode(' ', strip_tags($the_excerpt)), 0, 20)).'...';
						} else {
							echo strip_tags($the_excerpt);
						}
						echo '</p>';
						if ( $name || $position || $company || $location || $website) { echo '<p class="testimonial-meta">'; }
						if ($name) { echo '<span class="testimonial-name">'.$name.'</span>'; }
						if ($position) { echo '<span class="testimonial-position">'.$position.'</span>'; }
						if ($company) { echo '<span class="testimonial-company">'.$company.'</span>'; }
						if ($location) { echo '<span class="testimonial-location">'.$location.'</span>'; }
						if ($website) { echo '<br/><a href="http://'.$website.'" target="_blank"><span class="testimonial-website">'.$website.'</span></a>'; }
						if ( $name || $position || $company || $location || $website) { echo '</p>'; }
					if ( $showbutton ){ ?>
						<a href="<?php echo get_permalink(); ?>" class="button"><?php _e('Read More', 'braftonium'); echo '<span class="hide">'.$titlestring.'</span>'; ?></a>
					<?php } ?>
					
					</div>
					<?php if ( $name || $position || $company || $location || $website) { echo '</div>'; } ?>
				</div><!-- //list-item -->
			<?php endwhile;
			wp_reset_postdata();
			wp_reset_query();
		elseif ( $manual ):
			$count = count($manual);
			foreach( $manual as $item ):
				// here, "button" refers to the "link" option of this item, use permalink, post_title instead (not sure on target)
				$url = get_permalink( $item->ID );
				$title = get_the_title( $item->ID );
				?>
			
				<div class="list-item"><?php
					echo '<a href="'.$url.'">';
					// check for thumbnail here, use that info
					if ( has_post_thumbnail( $item->ID ) ):
						echo '<div class="image">';
							if ( is_array($imagestyle) && in_array('round', $imagestyle) ):
								echo get_the_post_thumbnail( $item->ID, $size, array( "class" => "round" ) );
							else:
								echo get_the_post_thumbnail( $item->ID, $size );
							endif;
						echo '</div>';
					elseif ( get_field('background_image', $item->ID) ):
						echo '<div class="image">';
							if ( is_array($imagestyle) && in_array('round', $imagestyle) ):
								echo '<img src="'.esc_url(get_field('background_image', $item->ID)).'" class="round">';
							else:
								echo '<img src="'.esc_url(get_field('background_image', $item->ID)).'">';
							endif;
						echo '</div>';
					endif;
					echo '<h3>';
					echo '<a href="'.$url.'">';
					$titlestring = $title;
					if (strlen($titlestring) > 65){
						$titlestring = implode(' ', array_slice(explode(' ', $titlestring), 0, 10)).'...';
					}
					echo $titlestring.'</a></h3>';
						
					echo '<div class="text"><p>';
						$content= apply_filters('the_content', get_post_field('post_content', $item->ID));
						$tagline = wp_kses_post(get_field('tagline', $item->ID));
						if ($content): 
							$the_excerpt= substr($content,0,strpos($content,'.')+1);
							if (strlen($the_excerpt) > 125){
								echo implode(' ', array_slice(explode(' ', strip_tags($the_excerpt)), 0, 15)).'...';
							} else {
								echo strip_tags($the_excerpt);
							}
						elseif ($tagline):
							$the_excerpt= substr($tagline,0,strpos($tagline,'.')+1);
							if (strlen($the_excerpt) > 125){
								echo implode(' ', array_slice(explode(' ', strip_tags($the_excerpt)), 0, 15)).'...';
							} else {
								echo strip_tags($the_excerpt);
							}
						endif;
					echo '</p></div>';
					// simply check for $showbutton...we have a confirmed URL
					if ( $showbutton ): echo '<a href="'.$url.'" class="blue-btn">';
						echo __( 'Read More', 'braftonium' );
						echo '</a>';
					endif;
				echo '</div><!-- //list-item -->';
			endforeach;
		elseif ( $first ):
			foreach ($first as $firstpost):
				$recent_query = new WP_Query(
					array( 
						'post_type' => $firstpost['post-type'],
						'category_name' =>  $firstpost['category'],
						'showposts' => $firstpost['number_of_posts']
					)
				);
			while ($recent_query->have_posts()) : $recent_query->the_post();
				$titlestring = get_the_title($post); ?>
				<div class="list-item"><a href="<?php the_permalink() ?>" name="<?php echo $titlestring; ?>">
					<?php if ( $imagestyle && in_array('round', $imagestyle) && has_post_thumbnail() ){
						?><div class="image"><?php
						 the_post_thumbnail('mediumsquared', ['class' => 'round']);
						 ?></div><?php
					} elseif( has_post_thumbnail()){
						?><div class="image"><?php
						the_post_thumbnail($size);
						?></div><?php
					}
					if (count($arr) > 1):
						echo '<strong>'.$firstpost['post-type'].'</strong>';
					endif;
					?>
						<h3><?php
						if (strlen($titlestring) > 65){
							$titlestring = implode(' ', array_slice(explode(' ', $titlestring), 0, 10)).'...';
						}
						echo $titlestring;
						?></h3></a>
					<?php
						echo '<p class="text">';
						$content= get_the_content();
						$the_excerpt= substr($content,0,strpos($content,'.')+1);
						if (strpos($the_excerpt, '.') !== false) :
							if (strlen($the_excerpt) > 125){
								echo implode(' ', array_slice(explode(' ', strip_tags($the_excerpt)), 0, 15)).'...';
							} else {
								echo strip_tags($the_excerpt);
							}
						else:
							echo $content;
						endif;
						echo '</p>';
					if ( $showbutton ){ ?>
						<a href="<?php echo get_permalink(); ?>" class="button"><?php _e( 'Read More', 'braftonium' ); echo '<span class="hide">'.$titlestring.'</span>'; ?></a>
					<?php } ?>
				</div><!-- //list-item -->
			<?php endwhile;
			wp_reset_postdata();
			wp_reset_query();
			endforeach;
		endif;
		echo '</div><!-- //slick -->';
		?>

	</div><!-- //wrap -->
</section><!-- section -->

<?php if ( $style['other'] && in_array('shadow', $style['other']) ) { echo '<div class="shadow"></div>'; } ?>