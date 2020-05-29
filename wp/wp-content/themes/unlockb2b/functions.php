<?php 

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 1000);
function child_enqueue_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/library/css/styles.css');
	wp_enqueue_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.9.0/css/all.css');

	// wp_enqueue_script( 'excetras-main', get_stylesheet_directory_uri(). '/library/js/exectras.js', array('jquery'));
}
function unlock_style_classes($styles){
    $styles['poly'] = __("Polygon Background", "unlockb2b");
    return $styles; 
}
add_filter('braftonium_style_classes', 'unlock_style_classes');
function my_custom_block_1($blocks){
	$blocks = array_merge($blocks, include __DIR__. '/library/blocks/full-width/components/video_popup/video_popup.block.php');
	return $blocks;
}
add_filter('braftonium_add_layout_block', 'my_custom_block_1');