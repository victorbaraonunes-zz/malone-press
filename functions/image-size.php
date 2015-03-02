<?php

/**
 * Remove default wp sizes.
 */

function remove_image( $sizes) {
    unset( $sizes['thumbnail']);
    unset( $sizes['medium']);
    unset( $sizes['large']);
     
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_image');

/**
 * Custom default image sizes.
 */

add_image_size('slideshow',920,440,true );


