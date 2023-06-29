<?php
//--------------------------------
// Agregar el meta box para el precio en el formulario de edición de proyectos
function add_proyecto_360_brochure_box()
{
    add_meta_box(
        'gs_links_360_brochure', // ID único del meta box
        'Enlaces de 360 y Brochure Proyecto', // Título del meta box
        'display_proyecto_360_brochure_box', // Callback para mostrar el contenido del meta box
        'proyectos', // Custom post type al que se debe agregar el meta box
        'advanced', // Posición del meta box (normal, side, advanced)
        'core' // Prioridad del meta box (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_proyecto_360_brochure_box');

// Mostrar el contenido del meta box de precio
function display_proyecto_360_brochure_box($post)
{
    $proyecto_id = isset($_GET['post']) ? $_GET['post'] : false;
    wp_nonce_field('proyecto_360_brochure_box', 'proyecto_360_brochure_nonce');
    // Recuperar el valor actual del precio (si existe)
    $url360 = get_post_meta($proyecto_id, 'gs_url_360', true);
    $urlBrochure = get_post_meta($proyecto_id, 'gs_url_brochure', true);
    // Output del campo de precio
?>
    <div class="ml-auto">
        <label class="block text-base" for="u360">Enlace del 360</label>
        <input class="text-base" id="u360" type="text" name="url360" value="<?= esc_attr($url360) ?>" />
    </div>
    <div class="ml-5 mr-auto">
        <label class="block text-base" for="urlBrochure">Enlace brochure</label>
        <input class="text-base" id="urlBrochure" type="text" name="urlBrochure" value="<?= esc_attr($urlBrochure) ?>" />

        <button class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid" id="add-brochure">Agregar brochure</button>
        <script>
            // function eliminarImagen(value) {
            //     var preview = document.getElementById('image-gallery-container');
            //     var inputHiden = document.getElementById('project_galeria_inmueble');
            //     var inputVal = inputHiden.getAttribute('value');

            //     var inputJson = JSON.parse(inputVal);
            //     var index = inputJson.indexOf(value);

            //     if (index !== -1) {
            //         inputJson.splice(index, 1);
            //         inputHiden.setAttribute('value', JSON.stringify(inputJson));
            //     }


            //     var previewImg = preview.querySelectorAll('.image-gallery-item');
            //     if (previewImg.length > 0 && index < previewImg.length) {
            //         previewImg[index].remove();
            //     }
            // }
            jQuery(document).ready(function($) {
                // Manejo de la subida de la imagen
                $('#add-brochure').click(function() {
                    var mediaUploader;
                    if (mediaUploader) {
                        mediaUploader.open();
                        return;
                    }
                    mediaUploader = wp.media({
                        title: 'Seleccionar PDF',
                        button: {
                            text: 'Usar este pdf'
                        },
                        multiple: false
                    });
                    mediaUploader.on('select', function() {
                        var attachment = mediaUploader.state().get('selection').toJSON();
                        // Guardar el arreglo actualizado en el campo oculto
                        document.getElementById('urlBrochure').setAttribute('value', attachment[0].url);


                    });
                    mediaUploader.open();
                });
            });
        </script>
    </div>
<?php
}

// Guardar el valor del precio en la base de datos
function save_proyecto_360_brochure_box($post_id)
{

    if (!isset($_POST['proyecto_360_brochure_nonce']) || !wp_verify_nonce($_POST['proyecto_360_brochure_nonce'], 'proyecto_360_brochure_box')) {
        return;
    }
    var_dump('Nonce verification passed.');
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    var_dump('Not doing autosave.');
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Comprobar que el usuario actual tenga permiso para editar el post
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Comprobar que el valor del precio se haya enviado y no esté vacío
    if (!isset($_POST['url360']) || empty($_POST['url360'])) {
        delete_post_meta($post_id, 'gs_url_360');
    } else {
        // Sanitizar y guardar el valor del precio
        $precio = sanitize_text_field($_POST['url360']);
        update_post_meta($post_id, 'gs_url_360', $precio);
    }

    if (!isset($_POST['urlBrochure']) || empty($_POST['urlBrochure'])) {
        delete_post_meta($post_id, 'gs_url_brochure');
    } else {
        $brochure = sanitize_text_field($_POST['urlBrochure']);
        update_post_meta($post_id, 'gs_url_brochure', $brochure);
    }
}
add_action('save_post_proyectos', 'save_proyecto_360_brochure_box');
