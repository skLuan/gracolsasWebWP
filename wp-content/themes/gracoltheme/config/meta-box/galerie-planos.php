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
    $serialized_image_gallery = get_post_meta($post->ID, 'project_galeria_planos', true);
    wp_nonce_field('project_galeria_planos_meta_box', 'project_galeria_planos_nonce');
    if (isset($serialized_image_gallery[0]) && $serialized_image_gallery[0] !== '') {
        $image_gallery = json_decode($serialized_image_gallery[0]);
    } else {
        $image_gallery = [];
    }
?>

    <div id="image-gallery-container-planos" class="mx-auto w-1/2">
        <?php
        if (isset($image_gallery) && !empty($image_gallery)) : ?>
            <?php foreach ($image_gallery as $i => $image_url) : ?>
                <div class="image-gallery-item-planos">
                    <figure>
                        <picture>
                            <img width="100%" src="<?= $image_url ?>" alt="">
                        </picture>
                    </figure>
                    <button class="remove-image px-4 py-1 border border-greenG-mid" onclick="eliminarImagenplanos('<?= htmlspecialchars($image_url) ?>')">Eliminar imagen</button>
                </div>
            <?php endforeach; ?>
            <div id="gallery-preview-planos"></div>
        <?php else : ?>
            <div class="image-gallery-item-planos">
                <div id="gallery-preview-planos"></div>
            </div>
        <?php endif; ?>
        <input id="project_galeria_planos" type="hidden" name="project_galeria_planos[]" value="<?= htmlspecialchars(json_encode($image_gallery)); ?>" readonly>
        <button class="border mt-5 border-greenG-mid text-white bg-greenG-mid rounded px-3 py-1" id="add-image-galerie-planos">Agregar imagen</button>
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
    // dd($_POST['project_galeria_planos']);
    var_dump('Nonce verification passed.');
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    var_dump('Not doing autosave.');
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    var_dump('User has edit post capability.');
    if (isset($_POST['project_galeria_planos'])) {
        $image_gallery = $_POST['project_galeria_planos'];
        // $image_gallery = array_map('sanitize_text_field', $_POST['project_galeria_planos']);
        var_dump('Image gallery:', $image_gallery);
        // $serialized_image_gallery = json_encode($image_gallery);
        update_post_meta($post_id, 'project_galeria_planos', $image_gallery);
    }
}
add_action('save_post_proyectos', 'save_galerie_planos_meta_data');
