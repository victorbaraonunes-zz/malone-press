<?php

/**
 * Custom Meta Boxes
 */
 
function admin_init(){
  add_meta_box("slideshow-meta", "Informacões Adicionais", "slideshow", "slideshow", "normal", "high");
}
add_action("admin_init", "admin_init");

/**
 * Custom Saves
 */

function save_details(){
    global $post;
    update_post_meta($post->ID, "slideshow-url", $_POST["slideshow-url"]);
}
add_action('save_post', 'save_details');

/**
 * Meta Box Slideshow
 */

function slideshow(){

  global $post;
  $custom = get_post_custom($post->ID);
  $url = $custom["slideshow-url"][0];
  
  ?>

    <p><label>URL de destino: (se houver):</label></p>
    <p><input type="text" style="width: 98%;" name="slideshow-url" value="<?php echo $url; ?>"/></p>

  <?php
}

