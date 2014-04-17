<?php

/**
 * Remove tamanhos padronizados pelo Wordpress.
 */

function remove_image( $sizes) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
     
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_image');

/**
 * Adiciona tamanhos personalizados.
 */

add_image_size('slideshow',960,480,true );


