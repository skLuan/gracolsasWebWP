<?php
function project_avance_post_type()
{
    $labels = array(
        'name'                  => __('Avances de obra', 'Post Type General Name', 'gracolsas'),
        'singular_name'         => __('Avance de obra', 'Post Type Singular Name', 'gracolsas'),
        'menu_name'             => __('Avances de obra', 'gracolsas'),
        'name_admin_bar'        => __('Avances de obra', 'gracolsas'),
        'archives'              => __('Archivos de Avances de obra', 'gracolsas'),
        'attributes'            => __('Atributos de Avances de obra', 'gracolsas'),
        'parent_item_colon'     => __('Avance de obra Padre:', 'gracolsas'),
        'all_items'             => __('Todos los Avances de obra', 'gracolsas'),
        'add_new_item'          => __('Agregar nuevo Avance de obra', 'gracolsas'),
        'add_new'               => __('Agregar nuevo', 'gracolsas'),
        'new_item'              => __('Nuevo Avance de obra', 'gracolsas'),
        'edit_item'             => __('Editar Avance de obra', 'gracolsas'),
        'update_item'           => __('Actualizar Avance de obra', 'gracolsas'),
        'view_item'             => __('Ver Avance de obra', 'gracolsas'),
        'view_items'            => __('Ver Avances de obra', 'gracolsas'),
        'search_items'          => __('Buscar Avance de obra', 'gracolsas'),
        'not_found'             => __('No se encontraron avances de obra', 'gracolsas'),
        'not_found_in_trash'    => __('No se encontraron avances de obra en la papelera', 'gracolsas'),
        'featured_image'        => __('Imagen destacada', 'gracolsas'),
        'set_featured_image'    => __('Establecer imagen destacada', 'gracolsas'),
        'remove_featured_image' => __('Remover imagen destacada', 'gracolsas'),
        'use_featured_image'    => __('Usar como imagen destacada', 'gracolsas'),
        'insert_into_item'      => __('Insertar en avance de obra', 'gracolsas'),
        'uploaded_to_this_item' => __('Cargado en este avance de obra', 'gracolsas'),
        'items_list'            => __('Lista de avances de obra', 'gracolsas'),
        'items_list_navigation' => __('Navegación de la lista de avances de obra', 'gracolsas'),
        'filter_items_list'     => __('Filtrar la lista de avances de obra', 'gracolsas'),
    );

    $args = array(
        'public' => true,
        'label' => 'Avances de obra',
        'description' => 'Avances de obra de Gracol',
        'supports' => array('title', 'editor', 'custom-fields', 'revisions'),
        'rewrite' => array('slug' => 'avances-obra'),
        'labels' => $labels,
        'show_in_menu' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-slides',
        'publicly_queryable' => true,
        'show_in_nav_menus' => true, 
        'show_in_rest' => true,
        'taxonomies' => array(),
        'has_archive' => true,
    );

    register_post_type('avance-obra', $args);

}
add_action('init', 'project_avance_post_type');
