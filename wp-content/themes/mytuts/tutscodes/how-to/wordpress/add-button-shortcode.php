<?php 
/*
* Add shortcode for button in WordPress  | Site - codematra.com
*/
add_shortcode('WpButton', 'add_button_function');
function add_button_function($atts){
	extract(shortcode_atts(array(
	'label' => 'Click Me',
	'classes' => 'anchor-link',
	'href' => '#'
	), $atts));
	$anchor = "<a class='$classes' href='$href'>$label</a>";
	return $anchor;
}

// This is the shortcode that you can use from the editor of your WordPress website.
// [WpButton href=’#’ label=’Click Here’ class=’btn-primary btn’]