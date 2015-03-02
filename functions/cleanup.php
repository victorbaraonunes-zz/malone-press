<?php

/**
 * Remove options menu.
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
 * Remove metaboxes from custom type array.
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
 * Remove tags, category and etc by CSS.
 */

function remove_by_css() {
    echo '
    <style type="text/css">
        #tagsdiv-post_tag, #category-adder { display: none; }
    </style>
    ';
}
add_action('admin_head', 'remove_by_css');

/**
 * Remove some dashboards widgets.
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
 * Custom Favicon
 */

function custom_favicon() {
    $favicon_url = TEMPLATE.'/img/favicon.png';
    echo '<link rel="shortcut icon" href="' . $favicon_url . '" />';
}
add_action( 'wp_head', 'custom_favicon' );
add_action('admin_head', 'custom_favicon');
add_action( 'login_head', 'custom_favicon' );

/**
 * Remove scripts and style parameters from tag
 */

function remove_parameters( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'remove_parameters', 9999 );
add_filter( 'script_loader_src', 'remove_parameters', 9999 );

/**
 * Remove some itens from dashborad menu.
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
 * Remove users color options.
 */

function remove_color() {
    global $_wp_admin_css_colors;
    $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'remove_color');

/**
 * Remove options screen.
 */

function remove_screen_options(){
    return false;
}
add_filter('screen_options_show_screen','remove_screen_options');

/**
 * Remove update alert, except admin.
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
 * Remove some assets from head.
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
 * Remove script and style from plugin Contact Form 7.
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









