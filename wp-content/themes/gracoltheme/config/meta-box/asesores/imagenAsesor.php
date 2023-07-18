<?php
function add_asesor_picture_meta_box()
{
    add_meta_box(
        'asesor_imagen_meta_box',
        'Imagenes del avance',
        'render_asesor_picture_meta_box',
        'asesores-comerciales',
        'advanced',
        'default'
    );
}
add_action('add_meta_boxes_asesores-comerciales', 'add_asesor_picture_meta_box');

function render_asesor_picture_meta_box($post)
{
    $asesor_id = isset($_GET['post']) ? $_GET['post'] : false;
    if ($asesor_id) {
        $picture = get_post_meta($asesor_id, 'imagen_asesor', true);
        // Resto del código...
    }
    wp_nonce_field('asesor_imagen_meta_box', 'asesor_imagen_nonce');
?>

    <div class="mx-auto">
        <figure>
            <picture>
                <img id="imageAsesor" width="100px" src="<?= $picture ?>" alt="">
            </picture>
        </figure>
        <p>
            <label for="imagen_asesor">Seleccione una imagen:</label>
            <input type="text" id="imagen_asesor" name="imagen_asesor" value="<?php echo esc_attr($picture); ?>" style="width: 100%;" />
            <input type="button" id="upload_image_button" class="button" value="Seleccionar imagen" />
        </p>
    </div>
    <script>
        jQuery(document).ready(function($) {
            // Manejo de la subida de la imagen
            $('#upload_image_button').click(function() {
                var mediaUploader;
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media({
                    title: 'Seleccionar imagen',
                    button: {
                        text: 'Usar esta imagen'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#imagen_asesor').val(attachment.url);
                    document.getElementById('imageAsesor').setAttribute('src',attachment.url);
                });
                mediaUploader.open();
            });
        });
    </script>
<?php
}

function save_asesores_comerciales_meta_data($post_id)
{
    if (!isset($_POST['asesor_imagen_nonce']) || !wp_verify_nonce($_POST['asesor_imagen_nonce'], 'asesor_imagen_meta_box')) {
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

    if (isset($_POST['imagen_asesor'])) {
        $image = $_POST['imagen_asesor'];
        update_post_meta($post_id, 'imagen_asesor', $image);
    }
}
add_action('save_post_asesores-comerciales', 'save_asesores_comerciales_meta_data');
