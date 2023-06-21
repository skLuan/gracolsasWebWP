<?php
//--------------------------------
// Agregar el meta box para el precio en el formulario de edición de proyectos
function add_proyecto_ubi_meta_box()
{
    add_meta_box(
        'ubicacion', // ID único del meta box
        'Ubicación del Proyecto', // Título del meta box
        'display_proyecto_ubi_meta_box', // Callback para mostrar el contenido del meta box
        'proyectos', // Custom post type al que se debe agregar el meta box
        'advanced', // Posición del meta box (normal, side, advanced)
        'default' // Prioridad del meta box (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_proyecto_ubi_meta_box');

// Mostrar el contenido del meta box de precio
function display_proyecto_ubi_meta_box($post)
{
    // Recuperar el valor actual del precio (si existe)
    $ciudad = get_post_meta($post->ID, 'gs_ciudad', true);
    $barrio = get_post_meta($post->ID, 'gs_barrio', true);
    // Output del campo de precio
?>
    <div class="ml-auto">
        <label class="text-base block" for="gsCiudad">Ciudad</label>
        <input class="text-base" id="gsCiudad" type="text" name="gs_ciudad" value="<?= esc_attr($ciudad) ?>" />
    </div>
    <div class="mr-auto ml-5">
        <label class="text-base block" for="gsBarrio">Barrio</label>
        <input class="text-base" id="gsBarrio" type="text" name="gs_barrio" value="<?= esc_attr($barrio) ?>" />
    </div>
<?php

}

function sanitizeGS($post_id, $metaData =''){
    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($_POST[$metaData]) || empty($_POST[$metaData])) {
        delete_post_meta($post_id, $metaData);
    } else {
        // Sanitizar y guardar el valor del precio
        $value = sanitize_text_field($_POST[$metaData]);
        update_post_meta($post_id, $metaData, $value);
    }
}

// Guardar el valor del precio en la base de datos
function save_proyecto_ubi_meta_box($post_id)
{
    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    sanitizeGS($post_id, 'gs_ciudad');
    sanitizeGS($post_id, 'gs_barrio');
}
add_action('save_post_proyectos', 'save_proyecto_ubi_meta_box');
