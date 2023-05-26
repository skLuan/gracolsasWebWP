<?php
function add_project_galeria_inmueble_meta_box()
{
    add_meta_box(
        'galerie_inmueble',
        'Imagenes del inmueble',
        'render_project_galerie_inmueble_meta_box',
        'proyectos',
        'advanced',
        'default'
    );
}
add_action('add_meta_boxes', 'add_project_galeria_inmueble_meta_box');

function render_project_galerie_inmueble_meta_box($post)
{
    $serialized_image_gallery = get_post_meta($post->ID, 'project_galeria_inmueble', true);
    wp_nonce_field('project_galeria_inmueble_meta_box', 'project_galeria_inmueble_nonce');
    if (isset($serialized_image_gallery[0]) && $serialized_image_gallery[0] !== '') {
        $image_gallery = json_decode($serialized_image_gallery[0]);
    } else {
        $image_gallery = [];
    }
?>

    <div id="image-gallery-container" class="mx-auto w-1/2">
        <?php
        if (isset($image_gallery) && !empty($image_gallery)) : ?>
            <?php foreach ($image_gallery as $i => $image_url) : ?>
                <div class="image-gallery-item">
                    <figure>
                        <picture>
                            <img width="100%" src="<?= $image_url ?>" alt="">
                        </picture>
                    </figure>
                    <button class="remove-image px-4 py-1 border border-greenG-mid" onclick="eliminarImagen('<?= htmlspecialchars($image_url) ?>')">Eliminar imagen</button>
                </div>
            <?php endforeach; ?>
            <div id="gallery-preview"></div>
        <?php else : ?>
            <div class="image-gallery-item">
                <div id="gallery-preview"></div>
            </div>
        <?php endif; ?>
        <input id="project_galeria_inmueble" type="hidden" name="project_galeria_inmueble[]" value="<?= htmlspecialchars(json_encode($image_gallery)); ?>" readonly>
        <button class="border mt-5 border-greenG-mid text-white bg-greenG-mid rounded px-3 py-1" id="add-image-galerie-inmueble">Agregar imagen</button>
    </div>
    <script>
        function eliminarImagen(value) {
            var preview = document.getElementById('image-gallery-container');
            var inputHiden = document.getElementById('project_galeria_inmueble');
            var inputVal = inputHiden.getAttribute('value');

            var inputJson = JSON.parse(inputVal);
            var index = inputJson.indexOf(value);

            if (index !== -1) {
                inputJson.splice(index, 1);
                inputHiden.setAttribute('value', JSON.stringify(inputJson));
            }


            var previewImg = preview.querySelectorAll('.image-gallery-item');
            if (previewImg.length > 0 && index < previewImg.length) {
                previewImg[index].remove();
            }
        }
        jQuery(document).ready(function($) {
            // Manejo de la subida de la imagen
            var inputVall = document.getElementById('project_galeria_inmueble').getAttribute('value');
            console.log('asi llega esta monda', inputVall);
            $('#add-image-galerie-inmueble').click(function() {
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
                    multiple: true
                });
                mediaUploader.on('select', function() {
                    var attachments = mediaUploader.state().get('selection').toJSON();
                    // $('#project_galeria_inmueble').val(attachment.url);

                    // Obtener el arreglo actual de imágenes del campo oculto
                    var inputVal = document.getElementById('project_galeria_inmueble').getAttribute('value');
                    var imagesArray = (inputVal !== '' && inputVal !== null && inputVal !== undefined) ? JSON.parse(inputVal) : [];

                    // Recorrer las imágenes seleccionadas
                    console.log('pree', imagesArray);
                    $.each(attachments, function(index, attachment) {
                        var imageURL = attachment.url;
                        var imageHTML = '<img src="' + imageURL + '" />';

                        // Agregar la imagen al contenedor
                        $('#gallery-preview').append(imageHTML);

                        imagesArray.push(imageURL);
                    });
                    // Guardar el arreglo actualizado en el campo oculto
                    $('#project_galeria_inmueble').val(JSON.stringify(imagesArray))
                    console.log($('#project_galeria_inmueble').val());


                });
                mediaUploader.open();
            });
        });
    </script>
<?php
}

function save_galerie_inmueble_meta_data($post_id)
{
    if (!isset($_POST['project_galeria_inmueble_nonce']) || !wp_verify_nonce($_POST['project_galeria_inmueble_nonce'], 'project_galeria_inmueble_meta_box')) {
        return;
    }
    // dd($_POST['project_galeria_inmueble']);
    var_dump('Nonce verification passed.');
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    var_dump('Not doing autosave.');
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    var_dump('User has edit post capability.');
    if (isset($_POST['project_galeria_inmueble'])) {
        $image_gallery = $_POST['project_galeria_inmueble'];
        // $image_gallery = array_map('sanitize_text_field', $_POST['project_galeria_inmueble']);
        var_dump('Image gallery:', $image_gallery);
        // $serialized_image_gallery = json_encode($image_gallery);
        update_post_meta($post_id, 'project_galeria_inmueble', $image_gallery);
    }
}
add_action('save_post_proyectos', 'save_galerie_inmueble_meta_data');
