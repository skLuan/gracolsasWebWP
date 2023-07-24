<?php
//--------------------------------
// Agregar el meta box para los telefonos de los asesores
function add_proyecto_asesores_numero_meta_box()
{
    add_meta_box(
        'gs_asesor_telefono', // ID único del meta box
        'Numero del asesor', // Título del meta box
        'display_asesores_numero_meta_box', // Callback para mostrar el contenido del meta box
        'asesores-comerciales', // Custom post type al que se debe agregar el meta box
        'side', // Posición del meta box (normal, side, advanced)
        'high' // Prioridad del meta box (high, core, default, low)
    );
}
add_action('add_meta_boxes_asesores-comerciales', 'add_proyecto_asesores_numero_meta_box');

// Mostrar el contenido del meta box de precio
function display_asesores_numero_meta_box($post)
{
    $proyecto_id = isset($_GET['post']) ? $_GET['post'] : false;
    // Recuperar el valor actual del precio (si existe)
    $telefono_asesor = get_post_meta($proyecto_id, 'gs_telefono_asesor', true);
    // Output del campo de precio
?>
    <div class="ml-auto">
        <label class="block text-base" for="telefono_asesor">Número de telefono</label>
        <input class="text-base" id="telefono_asesor" type="number" name="telefono_asesor" value="<?= esc_attr($telefono_asesor) ?>" />
    </div>
<?php

}

// Guardar el valor del precio en la base de datos
function save_proyecto_telefono_asesor_meta_box($post_id)
{
    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $telefono_asesor = intval($_POST['telefono_asesor']);
    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($telefono_asesor) || empty($telefono_asesor)) {
        delete_post_meta($post_id, 'gs_telefono_asesor');
    } else {
        // Sanitizar y guardar el valor del numero
        update_post_meta($post_id, 'gs_telefono_asesor', $telefono_asesor);
    }
}
add_action('save_post_asesores-comerciales', 'save_proyecto_telefono_asesor_meta_box');
