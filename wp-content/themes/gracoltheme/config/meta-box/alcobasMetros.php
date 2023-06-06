<?php
//--------------------------------
// Agregar el meta box para el precio en el formulario de edición de proyectos
function add_proyecto_alcobasMetros_meta_box()
{
    add_meta_box(
        'gs_Alcobas_Metros', // ID único del meta box
        'Alcobas y Metros cuadrados', // Título del meta box
        'display_proyecto_alcobas_metros_meta_box', // Callback para mostrar el contenido del meta box
        'proyectos', // Custom post type al que se debe agregar el meta box
        'advanced', // Posición del meta box (normal, side, advanced)
        'high' // Prioridad del meta box (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_proyecto_alcobasMetros_meta_box');

// Mostrar el contenido del meta box de precio
function display_proyecto_alcobas_metros_meta_box($post)
{
    // Recuperar el valor actual del precio (si existe)
    $noAlcobas = get_post_meta($post->ID, 'gs_noAlcobas', true);
    $mt2 = get_post_meta($post->ID, 'gs_mt2', true);
    // Output del campo de precio
?>
    <div class="ml-auto">
        <label class="text-base block" for="noAlcobas">Número de alcobas</label>
        <input class="text-base" id="noAlcobas" type="number" name="noAlcobas" value="<?= esc_attr($noAlcobas) ?>" />
    </div>
    <div class="mr-auto ml-5">
        <label class="text-base block" for="gsMt2">Metros cuadrados</label>
        <input class="text-base" id="gsMt2" type="number" name="gsMt2" value="<?= esc_attr($mt2) ?>" />
    </div>
<?php

}

// Guardar el valor del precio en la base de datos
function save_proyecto_alcobas_metros_meta_box($post_id)
{
    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($_POST['noAlcobas']) || empty($_POST['noAlcobas'])) {
        delete_post_meta($post_id, 'gs_noAlcobas');
    } else {
        // Sanitizar y guardar el valor del precio
        $alcobas = absint($_POST['noAlcobas']);
        update_post_meta($post_id, 'gs_noAlcobas', $alcobas);
    }

    if (!isset($_POST['gsMt2']) || empty($_POST['gsMt2'])) {
        delete_post_meta($post_id, 'gs_mt2');
    } else {
        $mt2 = absint($_POST['gsMt2']);
        update_post_meta($post_id, 'gs_mt2', $mt2);
    }
}
add_action('save_post_proyectos', 'save_proyecto_alcobas_metros_meta_box');
