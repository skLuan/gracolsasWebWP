<?php
require_once 'vendor/autoload.php';
require_once 'config/admin_edit.php';
require_once 'config/taxo-img.php';
require_once 'config/register_taxonomies.php';

define('IMAGE', get_stylesheet_directory_uri() . '/assets/img/');
define('GSINCLUDE', get_template_directory() . "/includes\/");
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
        'taxonomies' => array( 'categoria-proyecto', 'tag-proyecto', 'ciudadela', 'amenities' ),
    );
    register_post_type('proyectos', $args);
}

add_action('init', 'project_post_type');

function gs_template(){
    load_theme_textdomain('gracolsas');
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    // ---------------------- Register menus ----------------------
    register_nav_menus(
        array(
            'top_menu' => 'Menú Principal', // Menu pricipal de desktop
            'mobile_menu' => 'Mobile sideBar', // Menu hamburguesa de versión mobile
            'footer_menu' => 'Footer Menu' // Menu del footer
        )
    );
}
add_action('after_setup_theme', 'gs_template');


function init_template()
{

    // ---------------------- Register Styles ----------------------
    wp_enqueue_style('fonts', get_stylesheet_directory_uri() . '/assets/fonts/fonts.css', '1.0', 'all');
    wp_enqueue_style('styles', get_stylesheet_directory_uri() . '/style.css', 'tailwind', '1.0', 'all');
    
    if (!is_admin()) {
        wp_enqueue_style('tailwind', get_stylesheet_directory_uri() . '/assets/css/output.css', 'fonts', '1.0', 'all');
        wp_enqueue_style('swipercss', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css', 'tailwind', '1.0', 'all');
        wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', 'tailwind', '1.0', 'all');
    }

    // ---------------------- Register Scripts ----------------------
    wp_enqueue_script('jquery');
    wp_enqueue_script('lodash', 'https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js', array(), '4.17.21', true);
    wp_enqueue_script('iconify', 'https://code.iconify.design/iconify-icon/1.0.0-beta.2/iconify-icon.min.js', '', '1.0', 'all');
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', '', '1.0', 'all');
    wp_enqueue_script('gracolSwiper', get_stylesheet_directory_uri() . '/assets/js/swipers.js', ['swiper'], '1.8.1', 'all');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', ['iconify', 'lodash', 'swiper', 'gracolSwiper'], '1.8.1', 'all');
    wp_enqueue_script('infoBlock', get_stylesheet_directory_uri() . '/assets/js/infoBlock.js', ['wp-blocks', 'wp-element', 'wp-components'], '1.8.1', 'all');
    if(is_singular('proyectos')){
        wp_enqueue_script('formSend', get_stylesheet_directory_uri() . '/assets/js/proyectoSend.js', ['main'], '1.8.1', 'all');
    }

    register_block_type('gracoltheme/project-config', array(
        'editor_script' => 'infoBlock',
    ));
}

add_action('wp_enqueue_scripts', 'init_template');



function enqueue_media_script()
{
    wp_enqueue_media();
    $screen = get_current_screen();

    // Verificar si estamos en la página de edición de "proyectos"
    if ($screen->id === 'proyectos') {
        wp_enqueue_style('tailwind', get_stylesheet_directory_uri() . '/assets/css/output.css', 'fonts', '1.0', 'all');
        // wp_enqueue_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', 'tailwind', '1.0', 'all');
    }
}
add_action('admin_enqueue_scripts', 'enqueue_media_script');

function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
