<?php
//--------------------------------
// Agregar el meta box para el precio en el formulario de edición de proyectos
function add_proyecto_SMID_box()
{
    add_meta_box(
        'SM_ID_project', // ID único del meta box
        'ID Smarth Home', // Título del meta box
        'display_project_SMID', // Callback para mostrar el contenido del meta box
        'proyectos', // Custom post type al que se debe agregar el meta box
        'advanced', // Posición del meta box (normal, side, advanced)
        'low' // Prioridad del meta box (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_proyecto_SMID_box');

// Mostrar el contenido del meta box de precio
function display_project_SMID($post)
{
    // Recuperar el valor actual (si existe)
    $SMID = get_post_meta($post->ID, 'SM_ID_project', true);
?>
    <div class="w-11/12 mx-auto">
        <label class="block text-base" for="dinero">Smarth Home ID</label>
        <input class="w-full text-base" id="dinero" type="text" name="gs_SMID" value="<?= esc_attr($SMID) ?>" />
    </div>
<?php

}

// Guardar el valor del precio en la base de datos
function save_SMID($post_id)
{
    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($_POST['gs_SMID']) || empty($_POST['gs_SMID'])) {
        delete_post_meta($post_id, 'SM_ID_project');
    } else {
        // Sanitizar y guardar el valor del precio
        $precio = sanitize_text_field($_POST['gs_SMID']);
        update_post_meta($post_id, 'SM_ID_project', $precio);
    }
}
add_action('save_post_proyectos', 'save_SMID');