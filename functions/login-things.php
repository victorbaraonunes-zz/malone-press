<?php

/**
 * Custom login logo.
 */

function custom_logo() 
{
    echo '
    <style type="text/css">
        .login h1 a {background-image: url('.TEMPLATE.'/img/admin.png) !important; width:100% !important; height:125px !important; background-size: auto !important; }
    </style>
    ';
}
add_action('login_head', 'custom_logo');

/**
 * Custom login url.
 */

function custom_url() 
{ 
    return URL; 
}
add_filter( 'login_headerurl', 'custom_url' );

/**
 * Custom login title .
 */

function custom_title() {
    return NAME;
}
add_filter( 'login_headertitle', 'custom_title' );

/**
 * Custom login error message.
 */

function custom_error()
{
    return 'Por favor, tente novamente!';
}
add_filter('login_errors','custom_error');
