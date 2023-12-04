<?php
// ---------------------------------------- Ciudadelas
function gsRegisterCiudadelas()
{
    $args = [
        'hierarchical' => false,
        'labels' => [
            'name' => 'Ciudadelas',
            'singular_name' => 'Ciudadela'
        ],
        'show_in_nav_menu' => true,
        'show_admin_column' => true,
        'show_in_rest' => true, 
        'rewrite' => ['slug' => 'ciudadela']
    ];

    register_taxonomy('ciudadela', ['proyectos'], $args);

    
}

// ---------------------------------------- Categorias
function gsRegisterCatProject()
{
    $args = [
        'hierarchical' => true,
        'labels' => [
            'name' => 'Categorías de proyectos',
            'singular_name' => 'Categoría de proyectos'
        ],
        'show_in_nav_menu' => true,
        'show_admin_column' => true,
        'show_in_rest' => true, 
        'rewrite' => ['slug' => 'categoria-proyectos']
    ];

    register_taxonomy('categoria-proyecto', ['proyectos'], $args);
}
// ---------------------------------------- Ubicacion de asesores
function gsRegisterAsesorUbicacion()
{
    $args = [
        'hierarchical' => false,
        'labels' => [
            'name' => 'Ubicación del asesor',
            'singular_name' => 'Ubicacion asesor'
        ],
        'show_in_nav_menu' => true,
        'show_admin_column' => true,
        'show_in_rest' => true, 
        'rewrite' => []
    ];

    register_taxonomy('asesor-ubicacion', ['asesores-comerciales'], $args);
}

// ---------------------------------------- Tags
function gsRegisterTagsProject()
{
    $args = [
        'hierarchical' => true,
        'labels' => [
            'name' => 'Etiquetas de proyectos',
            'singular_name' => 'Etiqueta de proyectos'
        ],
        'show_in_nav_menu' => true,
        'show_admin_column' => true,
        'meta_box_cb' => true,
        'show_in_rest' => true, 
        'rewrite' => ['slug' => 'tag-proyectos']
    ];

    register_taxonomy('tag-proyecto', ['proyectos'], $args);

}

// ---------------------------------------- Tags
function gsRegisterAmenitiesProject()
{
    $args = [
        'hierarchical' => false,
        'labels' => [
            'name' => 'Amenities',
            'singular_name' => 'Amenitie'
        ],
        'show_in_nav_menu' => true,
        'meta_box_cb' => true,
        'show_in_rest' => true, 
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'amenities']
    ];

    register_taxonomy('amenities', ['proyectos'], $args);
}

add_action('init', 'gsRegisterCiudadelas');
add_action('init', 'gsRegisterCatProject');
add_action('init', 'gsRegisterTagsProject');
add_action('init', 'gsRegisterAmenitiesProject');
add_action('init', 'gsRegisterAsesorUbicacion');
