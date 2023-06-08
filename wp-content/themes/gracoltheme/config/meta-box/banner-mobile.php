<?php

function add_project_baner_mobile_meta_box()
{
    add_meta_box(
        'project_baner_mobile_meta_box',
        'Banner en mobile',
        'render_project_baner_mobile_meta_box',
        'proyectos',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_project_baner_mobile_meta_box');

function render_project_baner_mobile_meta_box($post)
{
    $image = get_post_meta($post->ID, 'project_baner_mobile', true);
    wp_nonce_field('project_baner_mobile_meta_box', 'project_baner_mobile_nonce');
?>
    <div class="mx-auto">
        <figure>
            <picture>
                <img id="gsMobileBannerShow" width="100px" src="<?= $image ?>" alt="">
            </picture>
        </figure>
        <p>
            <label for="project_baner_mobile">Seleccione una imagen para el baner mobile:</label>
            <input type="text" id="project_baner_mobile" name="project_baner_mobile" value="<?php echo esc_attr($image); ?>" style="width: 100%;" />
            <input type="button" id="upload_mobile_banner_button" class="button" value="Seleccionar imagen" />
        </p>
    </div>
    <script>
        jQuery(document).ready(function($) {
            // Manejo de la subida de la imagen
            $('#upload_mobile_banner_button').click(function() {
                var mediaUploader;
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media({
                    title: 'Seleccionar banner',
                    button: {
                        text: 'Usar este banner'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    console.log('entroo');
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#project_baner_mobile').val(attachment.url);
                    $('#gsMobileBannerShow').attr('src',attachment.url);
                });
                mediaUploader.open();
            });
        });
    </script>
<?php
}

function save_project_baner_mobile_data($post_id)
{
    if (!isset($_POST['project_baner_mobile_nonce']) || !wp_verify_nonce($_POST['project_baner_mobile_nonce'], 'project_baner_mobile_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['project_baner_mobile'])) {
        update_post_meta($post_id, 'project_baner_mobile', sanitize_text_field($_POST['project_baner_mobile']));
    }
}
add_action('save_post_proyectos', 'save_project_baner_mobile_data');
