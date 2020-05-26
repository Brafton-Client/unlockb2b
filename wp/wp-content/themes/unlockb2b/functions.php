<?php 


function unlock_style_classes($styles){
    $styles['poly'] = __("Polygon Background", "unlockb2b");
    return $styles; 
}
add_filter('braftonium_style_classes', 'unlock_style_classes');