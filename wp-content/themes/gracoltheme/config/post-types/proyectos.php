<?php
function project_post_type()
{
    $labels = array(
        'name'                  => __('Proyectos', 'Post Type General Name', 'gracolsas'),
        'singular_name'         => __('Proyecto', 'Post Type Singular Name', 'gracolsas'),
        'menu_name'             => __('Proyectos', 'gracolsas'),
        'name_admin_bar'        => __('Proyectos', 'gracolsas'),
        'archives'              => __('Archivos de Proyectos', 'gracolsas'),
        'attributes'            => __('Atributos de Proyectos', 'gracolsas'),
        'parent_item_colon'     => __('Proyecto Padre:', 'gracolsas'),
        'all_items'             => __('Todos los Proyectos', 'gracolsas'),
        'add_new_item'          => __('Agregar nuevo Proyecto', 'gracolsas'),
        'add_new'               => __('Agregar nuevo', 'gracolsas'),
        'new_item'              => __('Nuevo Proyecto', 'gracolsas'),
        'edit_item'             => __('Editar Proyecto', 'gracolsas'),
        'update_item'           => __('Actualizar Proyecto', 'gracolsas'),
        'view_item'             => __('Ver Proyecto', 'gracolsas'),
        'view_items'            => __('Ver Proyectos', 'gracolsas'),
        'search_items'          => __('Buscar Proyecto', 'gracolsas'),
        'not_found'             => __('No se encontraron proyectos', 'gracolsas'),
        'not_found_in_trash'    => __('No se encontraron proyectos en la papelera', 'gracolsas'),
        'featured_image'        => __('Imagen destacada', 'gracolsas'),
        'set_featured_image'    => __('Establecer imagen destacada', 'gracolsas'),
        'remove_featured_image' => __('Remover imagen destacada', 'gracolsas'),
        'use_featured_image'    => __('Usar como imagen destacada', 'gracolsas'),
        'insert_into_item'      => __('Insertar en proyecto', 'gracolsas'),
        'uploaded_to_this_item' => __('Cargado en este proyecto', 'gracolsas'),
        'items_list'            => __('Lista de proyectos', 'gracolsas'),
        'items_list_navigation' => __('Navegación de la lista de proyectos', 'gracolsas'),
        'filter_items_list'     => __('Filtrar la lista de proyectos', 'gracolsas'),
    );

    $args = array(
        'public' => true,
        'label' => 'Proyectos',
        'description' => 'Proyectos de Gracol',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'revisions'),
        'rewrite' => array('slug' => 'proyectos'),
        'labels' => $labels,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-network',
        'publicly_queryable' => true,
        'show_in_rest' => true,
        'taxonomies' => array('categoria-proyecto', 'tag-proyecto', 'ciudadela', 'amenities'),
    );
    register_post_type('proyectos', $args);
}
add_action('init', 'project_post_type');
