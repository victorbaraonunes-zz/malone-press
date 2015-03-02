<?php

/**
 * Custom title for custom type.
 */

function custom_title_name($title){

    $screen = get_current_screen();
    if ($screen->post_type == 'slideshow')
        $title = 'Nome de referência';
    return $title;

}
add_filter( 'enter_title_here', 'custom_title_name' );

/**
 * Remove buttons from MCE Editor.
 */

function remove_tinymce_buttons_1($buttons) {

	$remove = array(
	    //'bold',
	    //'italic',
	    'strikethrough',
	    'bullist',
	    'numlist',
	    'blockquote',
	    //'justifyleft',
	    //'justifycenter',
	    //'justifyright',
	    //'link',
	    //'unlink',
	    'wp_more',
	    'spellchecker',
	    'wp_fullscreen',
	    'wp_adv',
	    'separator', 
	    "separator",
	    "bullist", 
	    "separator",
	    //add more here...
	   );

	return array_diff($buttons, $remove);

}

function remove_tinymce_buttons_2($buttons) {
    return array();
}

add_filter("mce_buttons", "remove_tinymce_buttons_1", 99);
add_filter("mce_buttons_2", "remove_tinymce_buttons_2", 99);

/**
 * Remove add media.
 */

function remove_add_button() {

    global $current_screen;
    //if($current_screen->post_type == 'slideshow') 
        remove_action( 'media_buttons', 'media_buttons' );

}
//add_action('admin_head','remove_add_button');




