<?php

function add_project_logo_meta_box()
{
    add_meta_box(
        'project_logo_meta_box',
        'Logo del proyecto',
        'render_project_logo_meta_box',
        'proyectos',
        'advanced',
        'default'
    );
}
add_action('add_meta_boxes', 'add_project_logo_meta_box');

function render_project_logo_meta_box($post)
{
    $proyecto_id = isset($_GET['post']) ? $_GET['post'] : false;
    $image = get_post_meta($proyecto_id, 'project_logo', true);
    wp_nonce_field('project_logo_meta_box', 'project_logo_nonce');
?>
    <div class="mx-auto">
        <figure>
            <picture>
                <img width="100px" src="<?= $image ?>" alt="">
            </picture>
        </figure>
        <p>
            <label for="project_logo">Seleccione una imagen:</label>
            <input type="text" id="project_logo" name="project_logo" value="<?php echo esc_attr($image); ?>" style="width: 100%;" />
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
                    $('#project_logo').val(attachment.url);
                });
                mediaUploader.open();
            });
        });
    </script>
<?php
}

function save_project_image_meta_data($post_id)
{
    if (!isset($_POST['project_logo_nonce']) || !wp_verify_nonce($_POST['project_logo_nonce'], 'project_logo_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['project_logo'])) {
        update_post_meta($post_id, 'project_logo', sanitize_text_field($_POST['project_logo']));
    }
}
add_action('save_post_proyectos', 'save_project_image_meta_data');
