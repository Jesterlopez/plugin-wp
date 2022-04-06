<?php

function register_my_menu_page() {
  add_menu_page(
      'Video Gallery',
      'Video Gallery',
      'manage_options',
      'video_gallery',
      'theme_option_page',
      plugins_url('video-gallery/assets/images/icon_menu.png' ),
      6
  );
}

add_action( 'admin_menu', 'register_my_menu_page' );