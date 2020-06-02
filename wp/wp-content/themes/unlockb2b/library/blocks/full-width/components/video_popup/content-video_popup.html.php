<?php
/**
 * The template used for displaying list section of page.
 *
 * @package WordPress
 * @subpackage Braftonium
 * @since braftonium 1.0
 */

 // Note to Developers: If trying to use custom post types with taxonomy, uncomment and change line 122
 // @todo refactor line 122 to check if we are using custom post type with taxonomy instead of requiring modifications to the parent theme which is a no no!!

global $sectionrow;
$title = wp_kses_post(get_sub_field('title'));
if ($title):
	$titletext = ($sectionrow==0)?'<h1>'.$title.'</h1>':'<h2>'.$title.'</h2>';
endif;
$custom = get_sub_field('custom_list');
$show_text = get_sub_field('show_text');
	if ($show_text && in_array('intro', $show_text)): $intro = wp_kses_post(get_sub_field('intro_text')); endif;
	if ($show_text && in_array('outro', $show_text)): $outro = wp_kses_post(get_sub_field('outro_text')); endif;

$style = get_sub_field('style');
$classes = array('list', 'video-popup');

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
?>
<!-- Video Popups -->
<section id="post-<?php the_ID(); echo '-'.$sectionrow; ?>" class="<?php echo implode(' ',$classes); ?>" style="<?php
if ( $style['background_image'] ) { echo 'background-image: url(' . esc_url($style['background_image']) . ');'; }
if ( $style['background_color'] ) { echo 'background-color: ' . sanitize_hex_color($style['background_color']) . ';'; }
if ( $style['color'] ) { echo 'color: ' . sanitize_hex_color($style['color']) . ';'; } ?>" >
	<div class="wrap">

		<?php if ($titletext): echo $titletext; endif;
		if ($intro): echo $intro; endif;
			$count = count($custom);
			echo '<div class="container count'.$count.'">';
			$pop = 0;
			foreach( $custom as $item ):
				// if($item['button']):
				// 	$url = esc_url($item['button']['url']);
				// 	$text = sanitize_text_field($item['button']['title']);
				// 	$target = sanitize_text_field($item['button']['target']);
				// endif;
				if ( $item['title'] ): $titlestring = sanitize_text_field($item['title']); endif;
			?>
				<div class="list-item"><?php
				// if ( $item['button'] ): echo '<a href="'.$url.'" target="'. $target.'" name="'.$titlestring.'">'; endif;
				if ( $item['image'] ):
					echo '<div class="image">';
						if ( is_array($imagestyle) && in_array('round', $imagestyle) ):
							echo wp_get_attachment_image( intval($item['image']), $size, "", ["class" => "round"] );
						else:
							echo wp_get_attachment_image( intval($item['image']), $size );
						endif;
						echo '<h3 data-fancybox data-src="#popup-'.$sectionrow.'-'.$pop.'" href="javascript:;"><i class="fas fa-caret-right"></i>';
			
						echo $titlestring.'</h3>';
					echo '</div>';
				endif;
				// if ( $item['button'] ): echo '</a>'; endif;

				echo '<div style="display:none;" class="text" id="popup-'.$sectionrow.'-'.$pop.'">';

					if ( $item['content'] ): echo $item['content']; endif;
				echo '</div>';
				
				// if ( $showbutton && $url ): echo '<a href="'.$url.'" class="blue-btn" target="'. $target.'">';
				// 	if ($text=='Read More'||$text==''): _e( 'Read More', 'braftonium' ); echo '<span class="hide">'. $titlestring.'</span>';
				// 	else: echo $text;
				// 	endif;
				// 	echo '</a>';
				// endif;

				echo '</div>';
				$pop++;
			endforeach;
			

		?></div>

	<?php echo $outro; ?>
	</div>
</section><!-- End Video Popups section -->

<?php if ( $style['other'] && in_array('shadow', $style['other']) ) { echo '<div class="shadow"></div>'; } ?>
