<?php
//--------------------------------
// Agregar el meta box para el precio en el formulario de edición de proyectos
function add_proyecto_avance_ID_meta_box()
{
    add_meta_box(
        'gs_avance_projecto_id', // ID único del meta box
        'Avance de obra asociado', // Título del meta box
        'display_proyecto_avance_ID_meta_box', // Callback para mostrar el contenido del meta box
        'proyectos', // Custom post type al que se debe agregar el meta box
        'side', // Posición del meta box (normal, side, advanced)
        'high' // Prioridad del meta box (high, core, default, low)
    );
}
add_action('add_meta_boxes_proyectos', 'add_proyecto_avance_ID_meta_box');

// Mostrar el contenido del meta box de precio
function display_proyecto_avance_ID_meta_box($post)
{
    $avances = new WP_Query([
        'post_type' => 'avance-obra',
        'post_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title',
    ]);
    $proyecto_id = isset($_GET['post']) ? $_GET['post'] : false;
    // Recuperar el valor actual del precio (si existe)
    $avanceId = get_post_meta($proyecto_id, 'p_avance_id', true);
    echo var_dump($avanceId);
?>
    <div class="w-full ml-auto">
        <label class="block text-base" for="p_avance_id">Avance asociado</label>
        <select class="text-base" id="p_avance_id" name="p_avance_id">
            <?php
            if ($avances->have_posts()) :
                while ($avances->have_posts()) :
                    $avances->the_post();
                    if (get_the_ID() != $avanceId) : ?>
                        <option value="<?= get_the_ID() ?>"><?= the_title() ?></option>
                    <?php else : ?>
                        <option value="<?= get_the_ID() ?>" selected><?= the_title() ?></option>
                    <?php endif; ?>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </select>
    </div>
<?php

}

// Guardar el valor del precio en la base de datos
function save_proyecto_avance_ID_meta_box($post_id)
{
    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($_POST['p_avance_id']) || empty($_POST['p_avance_id'])) {
        delete_post_meta($post_id, 'p_avance_id');
    } else {
        // Sanitizar y guardar el valor del precio
        $avance_id = $_POST['p_avance_id'];
        update_post_meta($post_id, 'p_avance_id', $avance_id);
        update_post_meta($avance_id, 'a_project_id', $post_id);
    }
}
add_action('save_post_proyectos', 'save_proyecto_avance_ID_meta_box');
