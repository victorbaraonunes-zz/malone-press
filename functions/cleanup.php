<?php

/**
 * Remove opções do menu.
 */

function remove_menu() {
 
    //remove_menu_page( 'edit.php' );
    //remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
    remove_menu_page( 'edit-comments.php' );
    remove_menu_page( 'tools.php' );
    //remove_menu_page( 'themes.php' );
 
}

/**
 * Remove metaboxes do editor conforme array.
 */

function remove_metaboxes() {

    $array = array('post','slideshow');

    foreach($array as $v)
    {
        remove_meta_box( 'authordiv',$v,'normal' ); // Author Metabox
        remove_meta_box( 'commentstatusdiv',$v,'normal' ); // Comments Status Metabox
        remove_meta_box( 'commentsdiv',$v,'normal' ); // Comments Metabox
        remove_meta_box( 'postcustom',$v,'normal' ); // Custom Fields Metabox
        remove_meta_box( 'postexcerpt',$v,'normal' ); // Excerpt Metabox
        remove_meta_box( 'revisionsdiv',$v,'normal' ); // Revisions Metabox
        remove_meta_box( 'slugdiv',$v,'normal' ); // Slug Metabox
        remove_meta_box( 'trackbacksdiv',$v,'normal' ); // Trackback Metabox
    }

}
add_action('admin_menu','remove_metaboxes');

/**
 * Remove widgets da tela inicial do painel.
 */

function remove_widgets() {

    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);        
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);        
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);

}
add_action('wp_dashboard_setup', 'remove_widgets' );

/**
 * Customiza o rodapé do painel.
 */

function painel_footer() {
    echo "Desenvolvido por <a href='http://flize.com.br' title='Flize Tecnologia' target='_blank'>Flize Tecnologia</a>";
    //echo "Desenvolvido por <a href='http://lola33.com.br' title='Lola 33 - Comunicação e Marketing' target='_blank'>Lola 33 - Comunicação e Marketing</a>";
} 
add_filter('admin_footer_text', 'painel_footer');

/**
 * Customiza favicon do front, login e painel.
 */

function custom_favicon() {
    $favicon_url = TEMPLATE.'/img/favicon.png';
    echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action( 'wp_head', 'custom_favicon' );
add_action('admin_head', 'custom_favicon');
add_action( 'login_head', 'custom_favicon' );

/**
 * Remove parametros dos scripts e estilos.
 */

function remove_parameters( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_parameters', 9999 );
add_filter( 'script_loader_src', 'remove_parameters', 9999 );

/**
 * Remove cabeçalho do Wordpress no canto superior esquerdo do painel.
 */

function remove_header() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('view-site');
}
add_action( 'wp_before_admin_bar_render', 'remove_header' );

/**
 * Remove opções de cores na página do usuário.
 */

function remove_color() {
    global $_wp_admin_css_colors;
    $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'remove_color');

/**
 * Remove botão opções de tela.
 */

function remove_screen_options(){
    return false;
}
add_filter('screen_options_show_screen','remove_screen_options');

/**
 * Somente admin é notificado de atualizações do core e plugins.
 */

function remove_update()
{
    return null;
}

if(!current_user_can( 'manage_options' ))
{
    add_filter( 'pre_site_transient_update_core', 'remove_update');
}

add_action( 'admin_menu', 'remove_menu' );

/**
 * Remove assets desnecessários do front e adiciona suporte a thumbnail ao tema.
 */

add_filter( 'show_admin_bar', '__return_false' );
add_theme_support( 'post-thumbnails' );

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

/**
 * Remove script e estilo do plugin Contact Form 7.
 */

function remove_cf7_js() {

    if (!is_page('contato'))
        wp_deregister_script( 'contact-form-7' );

}
add_action( 'wp_print_scripts', 'remove_cf7_js');

function remove_cf7_css() {

    wp_deregister_style( 'contact-form-7' );

}
add_action( 'wp_print_styles', 'remove_cf7_css');

/**
 * Remove e customiza visualização do plugin Attchments conforme array..
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







