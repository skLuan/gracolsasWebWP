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
    $proyecto_id = isset($_GET['post']) ? $_GET['post'] : false;
    $serialized_image_gallery = get_post_meta($proyecto_id, 'project_galeria_inmueble', true);
    $figcaption = get_post_meta($proyecto_id, 'img_figcaption-interior', true);

    if (isset($figcaption) && $figcaption !== '') {
        $figcaption = json_decode($figcaption);
        foreach ($figcaption as $i => $figCap) {
           $figCap = htmlspecialchars($figCap, ENT_QUOTES, 'UTF-8');
        }
    } else {
        $figcaption = [];
    }
    wp_nonce_field('project_galeria_inmueble_meta_box', 'project_galeria_inmueble_nonce');
    if (isset($serialized_image_gallery[0]) && $serialized_image_gallery[0] !== '') {
        $image_gallery = json_decode($serialized_image_gallery[0]);
    } else {
        $image_gallery = [];
    }
?>

    <div id="image-gallery-container" class="w-1/2 mx-auto">
        <?php
        if (isset($image_gallery) && !empty($image_gallery)) : ?>
            <?php foreach ($image_gallery as $i => $image_url) : ?>
                <div class="mb-10 image-gallery-item">
                    <figure>
                        <picture>
                            <img width="100%" src="<?= $image_url ?>" alt="">
                        </picture>
                    </figure>
                    <div class="flex flex-row mt-2">
                        <div>
                            <label for="figCaption">Descripción de la imagen</label>
                            <br>
                            <input type="text" name="figCaption-interior[]" value="<?= isset($figcaption[$i]) ? $figcaption[$i] : '' ?>" id="figCaptionInterior" />
                        </div>
                        <button class="px-4 py-1 ml-auto border remove-image border-greenG-mid" onclick="eliminarImagen('<?= htmlspecialchars($image_url) ?>')">Eliminar imagen</button>
                    </div>
                </div>
            <?php endforeach; ?>
            <div id="gallery-preview"></div>
        <?php else : ?>
            <div class="image-gallery-item">
                <div id="gallery-preview"></div>
            </div>
        <?php endif; ?>
        <input id="project_galeria_inmueble" type="hidden" name="project_galeria_inmueble[]" value="<?= htmlspecialchars(json_encode($image_gallery)); ?>" readonly>
        <button class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid" id="add-image-galerie-inmueble">Agregar imagen</button>
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
    var_dump('Nonce verification passed.');
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    var_dump('Not doing autosave.');
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    var_dump('User has edit post capability.');
    $figCaptions = $_POST['figCaption-interior'];
    if (isset($figCaptions)) {

        if (is_array($figCaptions)) {
            $sanitizedFigCaptions = array_map('sanitize_text_field', $figCaptions);
            foreach ($figCaptions as $i => $figCap) {
                $figCap = htmlspecialchars($figCap, ENT_QUOTES, 'UTF-8');
            }
            $figCaptions = json_encode($figCaptions, JSON_UNESCAPED_UNICODE);
            update_post_meta($post_id, 'img_figcaption-interior', $figCaptions);
        }
    }

    if (isset($_POST['project_galeria_inmueble'])) {
        $image_gallery = $_POST['project_galeria_inmueble'];
        update_post_meta($post_id, 'project_galeria_inmueble', $image_gallery);
    }
}
add_action('save_post_proyectos', 'save_galerie_inmueble_meta_data');
