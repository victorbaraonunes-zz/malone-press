<?php

/**
 * Customiza a imagem da tela de login.
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
 * Customiza a URL imagem da tela de login.
 */

function custom_url() 
{ 
    return URL; 
}
add_filter( 'login_headerurl', 'custom_url' );

/**
 * Customiza o atributo title da imagem da tela de login.
 */

function custom_title() {
    return NAME;
}
add_filter( 'login_headertitle', 'custom_title' );

/**
 * Customiza a mensagem de erro ao efetuar login.
 */

function custom_error()
{
    return 'Por favor, tente novamente!';
}
add_filter('login_errors','custom_error');
