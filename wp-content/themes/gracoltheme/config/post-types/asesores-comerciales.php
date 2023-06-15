<?php
$labels = array(
    'name'                  => __('Asesores Comerciales', 'gracolsas'),
    'singular_name'         => __('Asesor Comercial', 'gracolsas'),
    'menu_name'             => __('Asesores Comerciales', 'gracolsas'),
    'name_admin_bar'        => __('Asesores Comerciales', 'gracolsas'),
    'attributes'            => __('Atributos Asesor Comercial', 'gracolsas'),
    'parent_item_colon'     => __('Asesor Comercial Padre:', 'gracolsas'),
    'all_items'             => __('Todos los asesores comerciales', 'gracolsas'),
    'add_new_item'          => __('Agregar nuevo asesor comercial', 'gracolsas'),
    'add_new'               => __('Agregar nuevo asesor comercial', 'gracolsas'),
    'new_item'              => __('Nuevo asesor comercial', 'gracolsas'),
    'edit_item'             => __('Editar asesor comercial', 'gracolsas'),
    'update_item'           => __('Actualizar asesor comercial', 'gracolsas'),
    'view_item'             => __('Ver asesor comercial', 'gracolsas'),
    'view_items'            => __('Ver Asesores Comerciales', 'gracolsas'),
    'search_items'          => __('Buscar asesores comerciales', 'gracolsas'),
    'not_found'             => __('No se encontraron asesores comerciales', 'gracolsas'),
    'not_found_in_trash'    => __('No se encontraron asesores comerciales en la papelera', 'gracolsas'),
    'featured_image'        => __('Imagen destacada', 'gracolsas'),
    'set_featured_image'    => __('Establecer imagen destacada', 'gracolsas'),
    'remove_featured_image' => __('Remover imagen destacada', 'gracolsas'),
    'use_featured_image'    => __('Usar como imagen destacada', 'gracolsas'),
    'insert_into_item'      => __('Insertar en asesor comercial', 'gracolsas'),
    'uploaded_to_this_item' => __('Cargado en este asesor comercial', 'gracolsas'),
    'items_list'            => __('Lista de asesores comerciales', 'gracolsas'),
    'items_list_navigation' => __('Navegación de la lista de asesores comerciales', 'gracolsas'),
    'filter_items_list'     => __('Filtrar la lista de asesores comerciales', 'gracolsas'),
);

$args = array(
    'public' => true,
    'label' => 'Asesores Comerciales',
    'description' => 'Asesores comerciales',
    'supports' => array('title', 'editor', 'custom-fields', 'revisions'),
    'rewrite' => array('slug' => 'asesores-comerciales'),
    'labels' => $labels,
    'show_in_menu' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-businessman',
    'publicly_queryable' => true,
    'show_in_rest' => true,
    'taxonomies' => array(),
);

register_post_type('asesores-comerciales', $args);

?>