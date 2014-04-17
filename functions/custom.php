<?php

/**
 * Customiza a função WP_HEAD.
 */

function custom_head() 
{
    wp_deregister_script('jquery');
    wp_enqueue_script('script', TEMPLATE.'/js/script.min.js',array(),'1.0');
    wp_enqueue_style('style',TEMPLATE.'/css/style.min.css', false, '1.0');
    wp_enqueue_style('lib',TEMPLATE.'/js/lib/main.min.css', false, '1.0');
}
add_action('wp_enqueue_scripts','custom_head');

/**
 * Retorno da thumbnail da página single.
 */
function the_single_thumbnail()
{
    if(is_single())
    {
        $img= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
   		$img = $img[0];
    }
    else
    {
        $img = TEMPLATE.'/img/facebook.jpg';
    }
    return $img;
}

/**
 * Retorno da URL da página single.
 */

function the_single_url()
{
    if(is_single())
    {
        $url = get_permalink();
    }
    else
    {
        $url = URL;
    }
    return $url;
}


