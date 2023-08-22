<?php
//--------------------------------
// Agregar el meta box para el precio en el formulario de edición de proyectos
function add_avance_proyecto_ID_meta_box()
{
    add_meta_box(
        'gs_avance_projecto_id', // ID único del meta box
        'Proyecto asociado', // Título del meta box
        'display_avance_proyecto_ID_meta_box', // Callback para mostrar el contenido del meta box
        'avance-obra', // Custom post type al que se debe agregar el meta box
        'side', // Posición del meta box (normal, side, advanced)
        'high' // Prioridad del meta box (high, core, default, low)
    );
}
add_action('add_meta_boxes_avance-obra', 'add_avance_proyecto_ID_meta_box');

// Mostrar el contenido del meta box de precio
function display_avance_proyecto_ID_meta_box($post)
{
    $avance_id = isset($_GET['post']) ? $_GET['post'] : false;

    $projects = new WP_Query([
        'post_type' => 'proyectos',
        'post_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title',
        'tax_query'        => array(
            array(
                'taxonomy' => 'categoria-proyecto',
                'field' => 'slug',
                'terms' => 'obras-entregadas',
                'operator' => 'IN'
            ),
        )
    ]);
    // Recuperar el valor actual del precio (si existe)
    $projectId = get_post_meta($avance_id, 'a_project_id', true);
    echo var_dump($avance_id);
?>
    <div class="w-full ml-auto">
        <label class="block text-base" for="a_project_id">Proyecto asociado</label>
        <select class="text-base" id="a_project_id" name="a_project_id">
            <?php
            if ($projects->have_posts()) :
                while ($projects->have_posts()) :
                    $projects->the_post();
                    if (get_the_ID() != $projectId) : ?>
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
function save_avance_proyecto_ID_meta_box($post_id)
{
    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($_POST['a_project_id']) || empty($_POST['a_project_id'])) {
        delete_post_meta($post_id, 'a_project_id');
    } else {
        // Sanitizar y guardar el valor del precio
        $proyecto_id = $_POST['a_project_id'];
        update_post_meta($post_id, 'a_project_id', $proyecto_id);

        update_post_meta($proyecto_id, 'p_avance_id', $post_id);
    }
}
add_action('save_post_avance-obra', 'save_avance_proyecto_ID_meta_box');
