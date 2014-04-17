<?php

/**
 * Customiza título do editor conforme Post Type.
 */

function custom_title_name($title){

    $screen = get_current_screen();
    if ($screen->post_type == 'slideshow')
        $title = 'Nome de referência';
    return $title;

}
add_filter( 'enter_title_here', 'custom_title_name' );

/**
 * Remove botões que não devem ser usados no front.
 */

function remove_tinymce_buttons_1($buttons) {

	return array(
	    'bold',
	    'italic',
	    'strikethrough',
	    //'bullist',
	    //'numlist',
	    //'blockquote',
	    //'justifyleft',
	    //'justifycenter',
	    //'justifyright',
	    'link',
	    'unlink',
	    //'wp_more',
	    //'spellchecker',
	    //'wp_fullscreen',
	    //'wp_adv',
	    //'separator', 
	    //"separator",
	    //"bullist", 
	    //"separator",
	    //add more here...
	    );

}

function remove_tinymce_buttons_2($buttons) {
    return array();
}

add_filter("mce_buttons", "remove_tinymce_buttons_1", 99);
add_filter("mce_buttons_2", "remove_tinymce_buttons_2", 99);

/**
 * Remove botão Adionar Mídia.
 */

function remove_add_button() {

    global $current_screen;
    //if($current_screen->post_type == 'slideshow') 
        remove_action( 'media_buttons', 'media_buttons' );

}
//add_action('admin_head','remove_add_button');




