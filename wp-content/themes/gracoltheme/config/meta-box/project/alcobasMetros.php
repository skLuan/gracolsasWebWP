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
add_action('add_meta_boxes_proyectos', 'add_proyecto_alcobasMetros_meta_box');

// Mostrar el contenido del meta box de precio
function display_proyecto_alcobas_metros_meta_box($post)
{
    $proyecto_id = isset($_GET['post']) ? $_GET['post'] : false;
    // Recuperar el valor actual del precio (si existe)
    $noAlcobas = get_post_meta($proyecto_id, 'gs_noAlcobas', true);
    $mt2 = get_post_meta($proyecto_id, 'gs_mt2', true);
    // Output del campo de precio
?>
    <div class="ml-auto">
        <label class="block text-base" for="noAlcobas">Número de alcobas</label>
        <input class="text-base" id="noAlcobas" type="text" name="noAlcobas" value="<?= esc_attr($noAlcobas) ?>" />
    </div>
    <div class="ml-5 mr-auto">
        <label class="block text-base" for="gsMt2">Metros cuadrados</label>
        <input class="text-base" id="gsMt2" type="text" name="gsMt2" value="<?= esc_attr($mt2) ?>" />
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
        $alcobas = $_POST['noAlcobas'];
        update_post_meta($post_id, 'gs_noAlcobas', $alcobas);
    }

    if (!isset($_POST['gsMt2']) || empty($_POST['gsMt2'])) {
        delete_post_meta($post_id, 'gs_mt2');
    } else {
        $mt2 = $_POST['gsMt2'];
        update_post_meta($post_id, 'gs_mt2', $mt2);
    }
}
add_action('save_post_proyectos', 'save_proyecto_alcobas_metros_meta_box');
