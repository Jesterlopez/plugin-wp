<?php

function theme_option_page () {
  ?>
  <div class="wrap gallery__videos">
    <h1>Gallery Settings</h1>
    <form method="post" action="options.php" novalidate="novalidate">

      <?php settings_fields('header_section_gallery');?>
      <?php do_settings_sections('theme-options'); ?>
      <?php submit_button(); ?>

    </form>
  </div>
  <?php
}

function display_options () {

  add_settings_section( 'header_section_gallery', 'Description', 'display_header_settings_content', 'theme-options' );

  add_settings_field( 'add_id_videos', 'Video Urls', 'add_id_videos', 'theme-options', 'header_section_gallery');

  add_settings_field( 'show_main_video', 'Main Video', 'show_main_video', 'theme-options', 'header_section_gallery');
  add_settings_field( 'add_class_main_video', 'Custom CSS', 'add_custom_class_main_video', 'theme-options', 'header_section_gallery');
  add_settings_field( 'add_class_gallery_videos', 'Custom CSS', 'add_class_gallery_videos', 'theme-options', 'header_section_gallery');


  register_setting('header_section_gallery',  'add_id_videos');
  register_setting('header_section_gallery',  'show_main_video');
  register_setting('header_section_gallery',  'add_class_main_video');
  register_setting('header_section_gallery',  'add_class_gallery_videos');

}


function display_header_settings_content () {
  ?>
    <p class="description">
      This is a plugin that allows you to embed YouTube videos, anywhere on your web page, simply by adding the ID of each video.
    </p>
    <p class="description">
      How to use it?
    </p>
    <p class="description">
      Simply copy and paste this shortcode <kbd>[video_gallery]</kbd> where you want to display the video gallery
    </p>
  <?php
}

function add_id_videos () {
  $idVideos = esc_attr(get_option('add_id_videos'));
  ?>
      <p class="description">
        Add the urls of the videos you want to show, add one per line.
      </p>
    <textarea name="add_id_videos" id="add_id_videos" cols="30" rows="10" placeholder="www.youtube.com/watch?v=5FDfg2_D"><?php echo $idVideos; ?></textarea>
  <?php
}

function show_main_video () {
  $showVideo = esc_attr(get_option('show_main_video'));

  ?>
    <label for="show_main_video">
      <input name="show_main_video" type="checkbox" id="show_main_video" value="1" <?php checked( '1', $showVideo ); ?> />
      Show Main Video.
    </label>
  <?php
}

function add_custom_class_main_video () {
  $cssMainVideo = esc_attr(get_option('add_class_main_video'));

  ?>
    <input name="add_class_main_video" type="text" id="add_class_main_video" value="<?php echo $cssMainVideo; ?>" >
    <p class="description">Allows you to add custom classes, to the main video, separate the classes by commas.</p>
  <?php
}

function add_class_gallery_videos () {
  $cssGalleryVideo = esc_attr(get_option('add_class_gallery_videos'));
  ?>
    <input name="add_class_gallery_videos" type="text" id="add_class_gallery_videos" value="<?php echo $cssGalleryVideo; ?>">
    <p class="description">Allows you to add custom classes, to the gallery video, separate the classes by commas.</p>
  <?php
}

add_action('admin_init', 'display_options' );