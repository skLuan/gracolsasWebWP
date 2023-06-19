<?php
require_once 'vendor/autoload.php';
require_once 'config/admin_edit.php';
require_once 'config/taxo-img.php';
require_once 'config/register_postTypes.php';
require_once 'config/register_taxonomies.php';
require_once 'includes/InputClass.php';
require_once 'includes/cardClass.php';
require_once 'includes/cardProjectClass.php';
require_once 'includes/searchController.php';
require_once 'includes/formProjectController.php';


define('IMAGE', get_stylesheet_directory_uri() . '/assets/img/');
define('GSINCLUDE', get_template_directory() . "/includes\/");

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
    wp_enqueue_script('lazysizes', get_stylesheet_directory_uri() . '/assets/js/lazysizes.min.js', '', '1.0', 'all');
    wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', ['lazysizes'], '1.0', 'all');
    wp_enqueue_script('gracolSwiper', get_stylesheet_directory_uri() . '/assets/js/swipers.js', ['swiper'], '1.8.1', 'all');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/main.js', ['iconify', 'lodash', 'swiper', 'gracolSwiper'], '1.8.1', 'all');
    wp_enqueue_script('infoBlock', get_stylesheet_directory_uri() . '/assets/js/infoBlock.js', ['wp-blocks', 'wp-element', 'wp-components'], '1.8.1', 'all');
    wp_enqueue_script('acordeon', get_stylesheet_directory_uri() . '/assets/js/acordeon.js', ['iconify', 'lodash', 'swiper', 'gracolSwiper'], '1.8.1', 'all');
    if(is_singular('proyectos')){
        wp_enqueue_script('formSend', get_stylesheet_directory_uri() . '/assets/js/proyectoSend.js', ['main'], '1.8.1', 'all');
        wp_enqueue_script('controlPrices', get_stylesheet_directory_uri() . '/assets/js/projectPrices.js', ['main'], '1.8.1', 'all');
    }

    register_block_type('gracoltheme/project-config', array(
        'editor_script' => 'infoBlock',
    ));

    wp_localize_script('main', 'gsLoopQuerys', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
    ]);
}

add_action('wp_enqueue_scripts', 'init_template');

//------------------ SenderController ------------------
$formController = new FormProjectController();
$formController->sendtoJS();


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
