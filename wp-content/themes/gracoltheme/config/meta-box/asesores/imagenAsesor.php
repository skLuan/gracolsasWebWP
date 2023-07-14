<?php
function add_galery_avance_meta_box()
{
    add_meta_box(
        'galerie_avance',
        'Imagenes del avance',
        'render_galery_avance_meta_box',
        'avance-obra',
        'advanced',
        'default'
    );
}
add_action('add_meta_boxes_avance-obra', 'add_galery_avance_meta_box');

function render_galery_avance_meta_box($post)
{
    $avance_obra_id = isset($_GET['post']) ? $_GET['post'] : false;
    if ($avance_obra_id) {
        $serialized_image_gallery = get_post_meta($avance_obra_id, 'galeria_avance', true);
        // Resto del código...
    }

    if (isset($serialized_image_gallery[0]) && $serialized_image_gallery[0] !== '') {
        $image_gallery = json_decode($serialized_image_gallery[0]);
    } else {
        $image_gallery = [];
    }

    wp_nonce_field('galeria_avance_meta_box', 'galeria_avance_nonce');
?>

    <div id="image-gallery-container-avance" class="w-1/2 mx-auto">
        <?php

        if (isset($image_gallery) && !empty($image_gallery)) : ?>
            <?php foreach ($image_gallery as $i => $image_url) : ?>
                <div class="image-gallery-item-avance">
                    <figure>
                        <picture>
                            <img width="100%" src="<?= $image_url ?>" alt="">
                        </picture>
                    </figure>
                </div>
            <?php endforeach; ?>
            <div id="gallery-preview-avance"></div>
        <?php else : ?>
            <div class="image-gallery-item-avance">
                <div id="gallery-preview-avance"></div>
            </div>
        <?php endif; ?>
        <input id="galeria_avance" type="hidden" name="galeria_avance[]" value="<?= htmlspecialchars(json_encode($image_gallery)); ?>" readonly>
        <button class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid" id="add-image-galerie-avance">Agregar imagen</button>
    </div>
    <script>
        function eliminarImagenSAvance(value) {
            var preview = document.getElementById('image-gallery-container-avance');
            var inputHiden = document.getElementById('galeria_avance');
            var inputVal = inputHiden.getAttribute('value');

            var inputJson = JSON.parse(inputVal);
            var index = inputJson.indexOf(value);
            if (index !== -1) {
                inputJson.splice(index, 1);
                inputHiden.setAttribute('value', JSON.stringify(inputJson));
            }
            console.log(index);


            var previewImg = preview.querySelectorAll('.image-gallery-item-avance');
            if (previewImg.length > 0 && index < previewImg.length) {
                previewImg[index].remove();
            }
        }
        jQuery(document).ready(function($) {
            // Manejo de la subida de la imagen
            $('#add-image-galerie-avance').click(function() {
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
                    // Obtener el arreglo actual de imágenes del campo oculto
                    var inputVal = document.getElementById('galeria_avance').getAttribute('value');
                    var imagesArray = (inputVal !== '' && inputVal !== null && inputVal !== undefined) ? JSON.parse(inputVal) : [];

                    // Recorrer las imágenes seleccionadas
                    console.log('pree', imagesArray);
                    $.each(attachments, function(index, attachment) {
                        var imageURL = attachment.url;
                        var imageHTML = '<img src="' + imageURL + '" />';

                        // Agregar la imagen al contenedor
                        $('#gallery-preview-avance').append(imageHTML);

                        imagesArray.push(imageURL);
                    });
                    // Guardar el arreglo actualizado en el campo oculto
                    $('#galeria_avance').val(JSON.stringify(imagesArray))
                    console.log($('#galeria_avance').val());


                });
                mediaUploader.open();
            });
        });
    </script>
<?php
}

function save_galerie_avance_meta_data($post_id)
{
    if (!isset($_POST['galeria_avance_nonce']) || !wp_verify_nonce($_POST['galeria_avance_nonce'], 'galeria_avance_meta_box')) {
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

    if (isset($_POST['galeria_avance'])) {
        $image_gallery = $_POST['galeria_avance'];
        update_post_meta($post_id, 'galeria_avance', $image_gallery);
    }
}
add_action('save_post_avance-obra', 'save_galerie_avance_meta_data');
