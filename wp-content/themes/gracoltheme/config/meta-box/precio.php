<?php
//--------------------------------
// Agregar el meta box para el precio en el formulario de edición de proyectos
function add_proyecto_price_meta_box()
{
    add_meta_box(
        'gs_precio_col', // ID único del meta box
        'Precio del Proyecto', // Título del meta box
        'display_proyecto_price_meta_box', // Callback para mostrar el contenido del meta box
        'proyectos', // Custom post type al que se debe agregar el meta box
        'side', // Posición del meta box (normal, side, advanced)
        'high' // Prioridad del meta box (high, core, default, low)
    );
    // add_meta_box(
    //     'gs_precio_SMLV', // ID único del meta box
    //     'Precio EN SMMLV', // Título del meta box
    //     'display_proyecto_price_SMLV_meta_box', // Callback para mostrar el contenido del meta box
    //     'proyectos', // Custom post type al que se debe agregar el meta box
    //     'side', // Posición del meta box (normal, side, advanced)
    //     'default' // Prioridad del meta box (high, core, default, low)
    // );
}
add_action('add_meta_boxes', 'add_proyecto_price_meta_box');

// Mostrar el contenido del meta box de precio
function display_proyecto_price_meta_box($post)
{
    // Recuperar el valor actual del precio (si existe)
    $precio = get_post_meta($post->ID, 'gs_precio_col', true);
    $precioSMLV = get_post_meta($post->ID, 'gs_precio_SMLV', true);
    // Output del campo de precio
?>
    <div class="ml-auto">
        <label class="text-base block" for="dinero">En dinero</label>
        <input class="text-base" id="dinero" type="text" name="gs_precio_col" value="<?= esc_attr($precio) ?>" />
    </div>
    <div class="mr-auto ml-5">
        <label class="text-base block" for="SMLV">En salarios minimos (SMLV)</label>
        <input class="text-base" id="SMLV" type="text" name="gs_precio_SMLV" value="<?= esc_attr($precioSMLV) ?>" />
    </div>
<?php

}

// Guardar el valor del precio en la base de datos
function save_proyecto_price_meta_box($post_id)
{
    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($_POST['gs_precio_col']) || empty($_POST['gs_precio_col'])) {
        delete_post_meta($post_id, 'gs_precio_col');
    } else {
        // Sanitizar y guardar el valor del precio
        $precio = sanitize_text_field($_POST['gs_precio_col']);
        update_post_meta($post_id, 'gs_precio_col', $precio);
    }

    if (!isset($_POST['gs_precio_SMLV']) || empty($_POST['gs_precio_SMLV'])) {
        delete_post_meta($post_id, 'gs_precio_SMLV');
    } else {
        $precioSMLV = sanitize_text_field($_POST['gs_precio_SMLV']);
        update_post_meta($post_id, 'gs_precio_SMLV', $precioSMLV);
    }
}
add_action('save_post_proyectos', 'save_proyecto_price_meta_box');