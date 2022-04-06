<?php

function cutUrlVideo ($arr, $index) {
  return str_replace('https://www.youtube.com/watch?v=', '', $arr[$index]);
}


add_shortcode( 'video_gallery', function ($attr, $content) {
  $allVideos = explode(',', str_replace("\r",",",get_option( 'add_id_videos' )));
  
  $showVideo = get_option('show_main_video');
  $cssMainVideo = str_replace(',', ' ', get_option('add_class_main_video'));
  $cssGalleryVideo = str_replace(',', ' ', get_option('add_class_gallery_videos'));
  $mainVideo = cutUrlVideo($allVideos, 0); 

  $countVideos = count($allVideos);
  ?>
  <?php if($mainVideo !== ''){	?>

      <div class="gallery__videos">
      <?php 
        if($showVideo === '1') {
          echo '<iframe 
            class="gallery__video__primary '.$cssMainVideo.'" 
            width="560" 
            height="315" 
            src="https://www.youtube.com/embed/'.$mainVideo.'?rel=0" 
            frameborder="0" 
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>';
        }
      ?>
      <div class="gallery__videos__grid">
      <?php
      if($showVideo === '1') {
        for ($i = 1 ; $i < $countVideos; $i++) { 

          echo '<iframe class="gallery__video '.$cssGalleryVideo.'" 
            width="560" 
            height="315" 
            src="https://www.youtube.com/embed/'.cutUrlVideo($allVideos, $i).'?rel=0" 
            frameborder="0" 
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>';
        }
      }else {
        for ($i = 0 ; $i < $countVideos; $i++) { 
          echo '<iframe class="gallery__video '.$cssMainVideo.'" 
            width="560" 
            height="315" 
            src="https://www.youtube.com/embed/'.cutUrlVideo($allVideos, $i).'?rel=0" 
            frameborder="0" 
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>';
        }
      }
      ?>
      </div>
    </div>
  <?php
  }
});