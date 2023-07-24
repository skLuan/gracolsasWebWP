<template id="template_avance">
    <div id="" class="avance-container">
        <label for="fecha_avance">Fecha del avance</label>
        <input type="text" id="fecha_avance" name="fecha_avance[]" placeholder="día - mes - año">
        <input id="" class="gal_avance" type="hidden" name="gal_avance[]" value="<?= htmlspecialchars(json_encode($image_gallery)); ?>" readonly>
        <button onclick="clickEvent()" class="px-3 py-1 mt-5 text-white border rounded border-greenG-mid bg-greenG-mid add-images-avance" id="">Agregar imagen</button>
        <div class="flex flex-row flex-wrap container-item-avance">
            <!-- <figure>
                    <picture>
                        <img width="100%" src="" alt="">
                    </picture>
                </figure> -->
            <div class="flex flex-row mt-2">
                <button class="px-4 py-1 ml-auto text-red-600 border border-red-600 w-fit remove-image" onclick="eliminarImagenAvance('<?= htmlspecialchars($image_url) ?>')">Eliminar imagen</button>
            </div>
        </div>
    </div>
</template>