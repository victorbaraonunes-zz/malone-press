<?php

/**
 * Customiza colunas da listagem do post type Post.
 */

function post_edit_columns($columns){
    unset($columns['tags']);
    unset($columns['comments']);
    return $columns;
}
add_filter("manage_edit-post_columns", "post_edit_columns");

/**
 * Customiza colunas da listagem conforme Post Type.
 */

function slideshow_columns($columns){
    $columns['thumb'] = __('Thumbnail');
    unset($columns['date']);
    unset($columns['title']);
    unset($columns['categories']);
    $columns['title'] = 'Título';
    $columns['date'] = 'Publicado em';
   
    return $columns;
}
add_filter("manage_edit-slideshow_columns", "slideshow_columns");

/**
 * Insere o conteúdo nas colunas customizadas.
 */

function posts_custom_columns($column_name, $id){

    if($column_name === 'thumb'){
        echo the_post_thumbnail('thumb');
    }

    //global $post;
    //$custom = get_post_custom($post->ID);
    //$email = $custom["email"][0];

    //if($column_name === 'email'){
        //echo $email;
    //}

}
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

/**
 * Ajusta estilo da coluna e adiona tamanho da miniatura.
 */

function thumb_column() {
    echo '
    <style type="text/css">
        #thumb {width:100px; !important; }
    </style>
    ';
}
add_action('admin_head', 'thumb_column');
add_image_size( 'thumb',100,100,true );

