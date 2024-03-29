<?php
function add_project_galeria_planos_meta_box()
{
    add_meta_box(
        'galerie_planos',
        'Imagenes del planos',
        'render_project_galerie_planos_meta_box',
        'proyectos',
        'advanced',
        'default'
    );
}
add_action('add_meta_boxes', 'add_project_galeria_planos_meta_box');

function render_project_galerie_planos_meta_box($post)
{
    $proyecto_id = isset($_GET['post']) ? $_GET['post'] : false;
    $serialized_image_gallery = get_post_meta($proyecto_id, 'project_galeria_planos', true);
    $figcaption = get_post_meta($proyecto_id, 'img_figcaption-planos', true);

    if (isset($figcaption) && $figcaption !== '') {
        $figcaption = json_decode($figcaption);
        foreach ($figcaption as $i => $figCap) {
            $figCap = htmlspecialchars($figCap, ENT_QUOTES, 'UTF-8');
        }
    } else {
        $figcaption = [];
    }

    wp_nonce_field('project_galeria_planos_meta_box', 'project_galeria_planos_nonce');
    if (isset($serialized_image_gallery[0]) && $serialized_image_gallery[0] !== '') {
        $image_gallery = json_decode($serialized_image_gallery[0]);
    } else {
        $image_gallery = [];
    }
?>

    <div id="image-gallery-container-planos" class="w-1/2 mx-auto">
        <?php
        if (isset($image_gallery) && !empty($image_gallery)) : ?>
            <?php foreach ($image_gallery as $i => $image_url) : ?>
                <div class="image-gallery-item-planos">
                    <figure>
                        <picture>
                            <img width="100%" src="<?= $image_url ?>" alt="">
                        </picture>
                    </figure>
                    <div class="flex flex-row mt-2">
                        <div>
                            <label for="figCaption">Descripción de la imagen</label>
                            <br>
                            <input type="text" name="figCaption-planos[]" value="<?= isset($figcaption[$i]) ? $figcaption[$i] : '' ?>" id="figCaption" />
                        </div>
                        <button class="px-4 py-1 ml-auto text-red-600 border border-red-600 w-fit remove-image" onclick="eliminarImagenplanos('<?= htmlspecialchars($image_url) ?>')">Eliminar imagen</button>
                    </div>
                </div>
            <?php endforeach; ?>
            <div id="gallery-preview-planos"></div>
        <?php else : ?>
            <div class="image-gallery-item-planos">
                <div id="gallery-preview-planos"></div>
            </div>
        <?php endif; ?>
        <input id="project_galeria_planos" type="hidden" name="project_galeria_planos[]" value="<?= htmlspecialchars(json_encode($image_gallery)); ?>" readonly>
        <button class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid" id="add-image-galerie-planos">Agregar imagen</button>
    </div>
    <script>
        function eliminarImagenplanos(value) {
            var preview = document.getElementById('image-gallery-container-planos');
            var inputHiden = document.getElementById('project_galeria_planos');
            var inputVal = inputHiden.getAttribute('value');

            var inputJson = JSON.parse(inputVal);
            var index = inputJson.indexOf(value);
            if (index !== -1) {
                inputJson.splice(index, 1);
                inputHiden.setAttribute('value', JSON.stringify(inputJson));
            }
            console.log(index);


            var previewImg = preview.querySelectorAll('.image-gallery-item-planos');
            if (previewImg.length > 0 && index < previewImg.length) {
                previewImg[index].remove();
            }
        }
        jQuery(document).ready(function($) {
            // Manejo de la subida de la imagen
            $('#add-image-galerie-planos').click(function() {
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
                    // $('#project_galeria_planos').val(attachment.url);

                    // Obtener el arreglo actual de imágenes del campo oculto
                    var inputVal = document.getElementById('project_galeria_planos').getAttribute('value');
                    var imagesArray = (inputVal !== '' && inputVal !== null && inputVal !== undefined) ? JSON.parse(inputVal) : [];

                    // Recorrer las imágenes seleccionadas
                    console.log('pree', imagesArray);
                    $.each(attachments, function(index, attachment) {
                        var imageURL = attachment.url;
                        var imageHTML = '<img src="' + imageURL + '" />';

                        // Agregar la imagen al contenedor
                        $('#gallery-preview-planos').append(imageHTML);

                        imagesArray.push(imageURL);
                    });
                    // Guardar el arreglo actualizado en el campo oculto
                    $('#project_galeria_planos').val(JSON.stringify(imagesArray))
                    console.log($('#project_galeria_planos').val());


                });
                mediaUploader.open();
            });
        });
    </script>
<?php
}

function save_galerie_planos_meta_data($post_id)
{
    if (!isset($_POST['project_galeria_planos_nonce']) || !wp_verify_nonce($_POST['project_galeria_planos_nonce'], 'project_galeria_planos_meta_box')) {
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
    $figCaptions = $_POST['figCaption-planos'];
    if (isset($figCaptions)) {
        $figCaptions = json_encode($figCaptions, JSON_UNESCAPED_UNICODE);
        update_post_meta($post_id, 'img_figcaption-planos', $figCaptions);
    }
    var_dump('User has edit post capability.');


    if (isset($_POST['project_galeria_planos'])) {
        $image_gallery = $_POST['project_galeria_planos'];
        update_post_meta($post_id, 'project_galeria_planos', $image_gallery);
    }
}
add_action('save_post_proyectos', 'save_galerie_planos_meta_data');
