<?php
// Agregar campo personalizado de imagen a la taxonomía
function agregar_imagen_taxonomy_meta()
{
?>
    <div class="form-field">
        <label for="imagen_taxonomy"><?php _e('Imagen', 'gracolsas'); ?></label>
        <input type="text" name="imagen_taxonomy" id="imagen_taxonomy" class="taxonomy-image-field" value="" />
        <button class="upload_image_button button">Subir imagen</button>
    </div>
    <div class="form-field">
        <img id="imagen_taxonomy_preview" src="" style="max-width:200px;max-height:200px;" />
    </div>

    <script>
        jQuery(document).ready(function($) {
            var mediaUploader;
            $(document).on('click', '.upload_image_button', function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Seleccionar imagen',
                    button: {
                        text: 'Usar esta imagen'
                    },
                    multiple: false
                });
                mediaUploader.on('select', function() {
                    var attachment = mediaUploader.state().get('selection').first().toJSON();
                    $('#imagen_taxonomy').val(attachment.url);
                    $('#imagen_taxonomy_preview').attr('src', attachment.url);
                });
                mediaUploader.open();
            });
        });
    </script>
    <?php
}
add_action('amenities_add_form_fields', 'agregar_imagen_taxonomy_meta', 10, 2);
add_action('amenities_edit_form_fields', 'agregar_imagen_taxonomy_meta', 10, 2);

// Guardar valor del campo personalizado de imagen
function guardar_imagen_taxonomy_meta($term_id, $tt_id)
{
    if (isset($_POST['imagen_taxonomy'])) {
        update_term_meta($term_id, 'imagen_taxonomy', esc_url_raw($_POST['imagen_taxonomy']));
    }
}
add_action('edited_amenities', 'guardar_imagen_taxonomy_meta', 10, 2);
add_action('create_amenities', 'guardar_imagen_taxonomy_meta', 10, 2);

// Mostrar imagen en la página de la taxonomía
function mostrar_imagen_taxonomy_meta($term)
{
    $imagen_taxonomy = get_term_meta($term->term_id, 'imagen_taxonomy', true);
    if (!empty($imagen_taxonomy)) {
    ?>
        <tr class="form-field">
            <th scope="row"><label for="imagen_taxonomy"><?php _e('Imagen', 'gracolsas'); ?></label></th>
            <td><img src="<?php echo $imagen_taxonomy; ?>" alt="<?php echo $term->name; ?>" style="max-width:200px;max-height:200px;" /></td>
        </tr>
<?php
    }
}
add_action('amenities_edit_form_fields', 'mostrar_imagen_taxonomy_meta', 10, 2);
