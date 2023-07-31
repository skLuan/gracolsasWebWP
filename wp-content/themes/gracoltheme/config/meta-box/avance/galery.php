<?php
// require '_template-gallery.php';
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
    wp_nonce_field('galeria_avance_meta_box', 'galeria_avance_nonce');
    $avance_obra_id = isset($_GET['post']) ? $_GET['post'] : false;
    if ($avance_obra_id) {
        $avance_obra = get_post_meta($avance_obra_id, 'galeria_avance', true);
    }
    $fechas = [];
    $galerias = [];
?>
    <template id="template_avance">
        <div id="" class="avance-container">
            <label for="fecha_avance">Fecha del avance</label>
            <input type="date" id="fecha_avance" name="fecha_avance[]" placeholder="día - mes - año">
            <input id="" class="gal_avance" type="hidden" name="gal_avance[]" value="" readonly>
            <button class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid add-images-avance" id="">Agregar imagen</button>
            <div class="flex flex-row flex-wrap container-item-avance">
            </div>
            <div class="flex flex-row mt-2">
                <button onclick="deleteAvance(this)" class="px-4 py-1 my-5 ml-auto text-red-600 border border-red-600 w-fit remove-image">Eliminar Avance</button>
            </div>
        </div>
    </template>
    <!-- ----------------------------------------------------------------------------------------- -->
    <!-- ----------------------------------------------------------------------------------------- -->
    <div id="image-gallery-container-avance" class="w-11/12 mx-auto">
        <button onclick="nuevoAvance()" class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid" id="add-avance-container">Nuevo Avance</button>
        <?php
        if (isset($avance_obra) && count($avance_obra) > 0 && $avance_obra[0] !== '[]') :
            echo var_dump($avance_obra[0]);
            foreach ($avance_obra as $key => $avance) :
                $fecha = $avance['fecha'];
                $galeria = json_decode($avance['galery']);
                $gal = htmlspecialchars(json_encode($galeria, JSON_UNESCAPED_SLASHES));
        ?>
                <div id="" class="avance-container">
                    <label for="fecha_avance">Fecha del avance</label>
                    <input class="mr-5" type="date" id="fecha_avance" value="<?= $fecha ?>" name="fecha_avance[]" placeholder="día - mes - año">
                    <input id="" class="gal_avance" type="hidden" name="gal_avance[]" value="<?= $gal ?>" readonly>
                    <button class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid add-images-avance" id="">Agregar imagen</button>
                    <div class="flex flex-row flex-wrap container-item-avance">
                        <?php foreach ($galeria as $i => $img) : ?>
                            <figure class="w-1/3 mx-5">
                                <picture>
                                    <img width="100%" src=" <?= htmlspecialchars($img) ?>" alt="">
                                </picture>
                                <button class="px-4 py-1 ml-auto text-red-600 border border-red-600 w-fit remove-image" onclick="deleteImage(this)">Eliminar imagen</button>
                            </figure>
                        <?php endforeach; ?>
                    </div>
                    <div class="flex flex-row mt-2">
                        <button onclick="deleteAvance(this)" class="px-4 py-1 my-5 ml-auto text-red-600 border border-red-600 w-fit remove-image">Eliminar Avance</button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div id="" class="avance-container">
                <label for="fecha_avance">Fecha del avance</label>
                <input class="mr-5" type="date" id="fecha_avance" name="fecha_avance[]" placeholder="día - mes - año">
                <input id="" class="gal_avance" type="hidden" name="gal_avance[]" value="<?php // htmlspecialchars(json_encode($image_gallery)); 
                                                                                            ?>" readonly>
                <button class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid add-images-avance" id="">Agregar imagen</button>
                <div class="flex flex-row flex-wrap container-item-avance">
                </div>
                <div class="flex flex-row mt-2">
                    <button onclick="deleteAvance(this)" class="px-4 py-1 my-5 ml-auto text-red-600 border border-red-600 w-fit remove-image">Eliminar Avance</button>
                </div>
            </div>
        <?php endif; ?>

    </div>
    <script>
        function nuevoAvance() {
            let template = document.getElementById('template_avance').content;
            let clone = template.cloneNode(true);
            let container = document.getElementById('image-gallery-container-avance');
            clone.querySelector('button.add-images-avance').addEventListener('click', clickEvent);
            container.insertBefore(clone, container.querySelector('.avance-container'));
        }

        function deleteAvance(btn) {
            avanceContainer = btn.parentNode.parentNode;
            if (avanceContainer.classList.contains('avance-container')) {
                avanceContainer.parentNode.removeChild(avanceContainer);
            }
        }

        function deleteImage(btn) {
            let btnParent = btn.parentNode;
            let image = btnParent.querySelector('img');
            let bigContainer = btnParent.parentNode.parentNode;
            if (bigContainer.classList.contains('avance-container')) {
                let imgInput = bigContainer.querySelector('input.gal_avance');
                let value = imgInput.getAttribute('value');
                let arrayValue = JSON.parse(value);
                let imageTodelete = image.getAttribute('src').trim();
                let indexTodelete = value.indexOf(imageTodelete);
                if (indexTodelete !== -1) {
                    arrayValue.splice(indexTodelete, 1);
                    imgInput.setAttribute('value', JSON.stringify(arrayValue));
                    btnParent.remove();
                }
            };
        }

        function clickEvent(e) {
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
                // Recorrer las imágenes seleccionadas
                let container = e.target.parentNode;
                let inputImages = container.querySelector('input.gal_avance');
                let preAtribbute = JSON.parse(inputImages.getAttribute('value'));
                var imgAr = [];
                console.log('pree');
                console.log(preAtribbute);
                if (preAtribbute.length > 0) {
                    imgAr = preAtribbute;
                }
                let imageContainer = e.target.parentNode.querySelector('.container-item-avance');
                jQuery.each(attachments, function(index, attachment) {
                    var imageURL = attachment.url;
                    var btnRemove = '<button class="px-4 py-1 ml-auto text-red-600 border border-red-600 w-fit remove-image" onclick="deleteImage(this)">Eliminar imagen</button>';
                    var imageHTML = '<figure class="w-1/3 mx-5"><picture><img width="" src="' + imageURL + '"></picture>' + btnRemove + '</figure>';

                    // Agregar la imagen al contenedor
                    // jQuery('.container-item-avance').append(imageHTML);
                    imageContainer.insertAdjacentHTML('beforeend', imageHTML);

                    imgAr.push(imageURL);
                });
                console.log(container);
                // Guardar el arreglo actualizado en el campo oculto
                inputImages.setAttribute('value', JSON.stringify(imgAr));
            });
            mediaUploader.open();
        }
        jQuery(document).ready(function($) {
            // Manejo de la subida de la imagen
            $('.add-images-avance').on('click', clickEvent);
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
    var_dump('User has edit post capability.');

    // -------------------------------------- Guardado nuevo
    if (isset($_POST['gal_avance']) && isset($_POST['fecha_avance'])) {
        $fecha_avance = $_POST['fecha_avance'];
        $image_gallery = $_POST['gal_avance'];
        foreach ($fecha_avance as $key => $value) {
            $full_avance[] = [
                "fecha" => $value,
                "galery" => $image_gallery[$key],
            ];
        }
        // dd($image_gallery);
        update_post_meta($post_id, 'galeria_avance', $full_avance);
    } else {
    }
}
add_action('save_post_avance-obra', 'save_galerie_avance_meta_data');
