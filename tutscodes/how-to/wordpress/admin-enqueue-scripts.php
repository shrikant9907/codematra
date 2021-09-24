<?php
/*
* Add stylesheets and scripts in WordPress Dashboard | Site: codematra.com
*/
add_action( 'admin_enqueue_scripts', 'admin_styles_scripts' );
function admin_styles_scripts() {

  // Add stylesheet
  wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri().'/css/admin-style.css' );

  // Admin Scripts
  wp_enqueue_script( 'admin-scripts', get_stylesheet_directory_uri().'/js/admin-scripts.js', '20210920', true );
  
}