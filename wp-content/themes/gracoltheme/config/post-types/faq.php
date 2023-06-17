<?php
function faq_post_type()
{
    $labels = array(
        'name'                  => __('Preguntas frecuentes', 'Post Type General Name', 'gracolsas'),
        'singular_name'         => __('Preguntas frecuentes', 'Post Type Singular Name', 'gracolsas'),
        'menu_name'             => __('Preguntas frecuentes', 'gracolsas'),
        'name_admin_bar'        => __('Preguntas frecuentes', 'gracolsas'),
        'attributes'            => __('Atributos FAQ', 'gracolsas'),
        'parent_item_colon'     => __('Proyecto Padre:', 'gracolsas'),
        'all_items'             => __('Todas las preguntas', 'gracolsas'),
        'add_new_item'          => __('Agregar nueva pregunta', 'gracolsas'),
        'add_new'               => __('Agregar nueva pregunta', 'gracolsas'),
        'new_item'              => __('Nueva pregunta', 'gracolsas'),
        'edit_item'             => __('Editar pregunta', 'gracolsas'),
        'update_item'           => __('Actualizar pregunta', 'gracolsas'),
        'view_item'             => __('Ver pregunta', 'gracolsas'),
        'view_items'            => __('Ver Preguntas', 'gracolsas'),
        'search_items'          => __('Buscar preguntas', 'gracolsas'),
        'not_found'             => __('No se encontraron preguntas', 'gracolsas'),
        'not_found_in_trash'    => __('No se encontraron preguntas en la papelera', 'gracolsas'),
        'featured_image'        => __('Imagen destacada', 'gracolsas'),
        'set_featured_image'    => __('Establecer imagen destacada', 'gracolsas'),
        'remove_featured_image' => __('Remover imagen destacada', 'gracolsas'),
        'use_featured_image'    => __('Usar como imagen destacada', 'gracolsas'),
        'insert_into_item'      => __('Insertar en pregunta', 'gracolsas'),
        'uploaded_to_this_item' => __('Cargado en esta pregunta', 'gracolsas'),
        'items_list'            => __('Lista de preguntas', 'gracolsas'),
        'items_list_navigation' => __('Navegación de la lista de preguntas', 'gracolsas'),
        'filter_items_list'     => __('Filtrar la lista de preguntas', 'gracolsas'),
    );

    $args = array(
        'public' => true,
        'label' => 'Preguntas Frecuentes',
        'description' => 'Preguntas frecuentes',
        'supports' => array('title', 'editor', 'custom-fields', 'revisions'),
        'rewrite' => array('slug' => 'faq'),
        'labels' => $labels,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-editor-help',
        'publicly_queryable' => true,
        'show_in_rest' => true,
        'taxonomies' => array(),
    );
    register_post_type('faq', $args);
}
add_action('init', 'faq_post_type');
