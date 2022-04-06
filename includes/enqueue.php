<?php

function wp_styles_enqueue() {
  wp_enqueue_style( 'styles-front-gallery', plugins_url( 'assets/css/styles-front.css', dirname(__FILE__) ) ,false,'1.0.0','all');
}

add_action( 'wp_enqueue_scripts', 'wp_styles_enqueue' );

function wp_script_enqueue($hook) {
  if ( 'toplevel_page_video_gallery' !== $hook ) {
    return;
  }
  
  wp_enqueue_style ( 'styles-admin-gallery', plugins_url( 'assets/css/styles-admin.css' , dirname(__FILE__) ), false, '1.0.0', 'all' );
  // wp_enqueue_script( 'gallery-admin-script', plugins_url( 'assets/js/script.js' , dirname(__FILE__) ), array(), '1.0.0', true );

}

add_action( 'admin_enqueue_scripts', 'wp_script_enqueue' );