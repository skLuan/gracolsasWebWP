<?php
//--------------------------------
// Agregar el meta box para el precio en el formulario de edición de proyectos
function add_proyecto_locations_meta_box()
{
    add_meta_box(
        'gs_llegadas_col', // ID único del meta box
        'Precio del Proyecto', // Título del meta box
        'display_proyecto_locations_meta_box', // Callback para mostrar el contenido del meta box
        'proyectos', // Custom post type al que se debe agregar el meta box
        'advanced', // Posición del meta box (normal, side, advanced)
        'high' // Prioridad del meta box (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_proyecto_locations_meta_box');

// Mostrar el contenido del meta box de precio
function display_proyecto_locations_meta_box($post)
{
    $proyecto_id = isset($_GET['post']) ? $_GET['post'] : false;

    // Recuperar el valor actual del precio (si existe)
    $googleUrl = get_post_meta($proyecto_id, 'gs_google_location', true);
    $wazeUrl = get_post_meta($proyecto_id, 'gs_waze_location', true);
    // Output del campo de precio
?>
    <div class="ml-auto">
        <label class="block text-base" for="gs_google_location">Google link</label>
        <input class="text-base" id="gs_google_location" type="text" name="gs_google_location" value="<?= esc_attr($googleUrl) ?>" />
    </div>
    <div class="ml-5 mr-auto">
        <label class="block text-base" for="gs_waze_location">Waze link</label>
        <input class="text-base" id="gs_waze_location" type="text" name="gs_waze_location" value="<?= esc_attr($wazeUrl) ?>" />
    </div>
<?php

}

// Guardar el valor del precio en la base de datos
function save_proyecto_locations_meta_box($post_id)
{
    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($_POST['gs_google_location']) || empty($_POST['gs_google_location'])) {
        delete_post_meta($post_id, 'gs_precio_col');
    } else {
        // Sanitizar y guardar el valor del precio
        $precio = sanitize_text_field($_POST['gs_google_location']);
        update_post_meta($post_id, 'gs_google_location', $precio);
    }

    if (!isset($_POST['gs_waze_location']) || empty($_POST['gs_waze_location'])) {
        delete_post_meta($post_id, 'gs_waze_location');
    } else {
        $precioSMLV = sanitize_text_field($_POST['gs_waze_location']);
        update_post_meta($post_id, 'gs_waze_location', $precioSMLV);
    }
}
add_action('save_post_proyectos', 'save_proyecto_locations_meta_box');
