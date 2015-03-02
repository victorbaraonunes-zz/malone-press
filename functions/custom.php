<?php

/**
 * Custom dashborad footer.
 */

function painel_footer() {
    echo "Desenvolvido por <a href='http://flize.com.br' title='Flize Tecnologia' target='_blank'>Flize Tecnologia</a>";
} 
add_filter('admin_footer_text', 'painel_footer');

/**
 * Custom WP_Head.
 */

function custom_head() 
{
    wp_deregister_script('jquery');
    wp_enqueue_script('script', TEMPLATE.'/js/script.min.js',array(),'1.0');
    wp_enqueue_style('style',TEMPLATE.'/css/style.min.css', false, '1.0');
}
add_action('wp_enqueue_scripts','custom_head');

/**
 * Custom thumbnail on single page.
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
    echo $img;
}

/**
 * Custom url on single page.
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
    echo $url;
}

/**
 * Custom excerpt
 */

function the_custom_excerpt($size = 300){

    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $size);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'[...] <a href="'.get_the_permalink().'" title="Leia Mais" class="mais">Leia Mais</a>';
    echo $excerpt;

}

/**
 * Custom attachments for custom type.
 */

function attachments( $attachments )
{

    $array = array('post');

    $args = array(
     
        'label' => 'Anexos',
        'post_type' => $array,
        'filetype' => null, //(array) (image|video|text|audio|application)
        //'note' => 'Anexe arquivos aqui!',
        'button_text' => __( 'Anexar Imagens', 'attachments' ),
        'modal_text' => __( 'Anexos', 'attachments' ),
     
        'fields' => array(
            array(
            'name' => 'title',
            'type' => 'text',
            'label' => __( 'Título', 'attachments' ),
            ),
        ),
    );
 
    $attachments->register( 'attachments', $args );
}
 
add_action( 'attachments_register', 'attachments' );


