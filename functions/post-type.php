<?php

/**
 * PostType Slideshow
 */

function custom_slideshow() {
  $labels = array(
    'name'               => 'Slideshow',
    'singular_name'      => 'Slideshow',
    'add_new'            => 'Adicionar Imagem',
    'add_new_item'       => 'Adicionar Imagem',
    'edit_item'          => 'Editar',
    'new_item'           => 'Nova IMagem',
    'all_items'          => 'Todos as Imagens',
    'view_item'          => 'Ver Imagem',
    'search_items'       => 'Procurar Imagem',
    'not_found'          => 'Itens não encontrados',
    'not_found_in_trash' => 'Nenhum item na lixeira',
    'parent_item_colon'  => '',
    'menu_name'          => 'Slideshow'
  );

  $args = array(
    'labels'             => $labels,
    'public'             => false,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => false,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-images-alt2',
    'supports'           => array( 'title', 'thumbnail')
  );

  register_post_type( 'slideshow', $args );
}

add_action( 'init', 'custom_slideshow' );
