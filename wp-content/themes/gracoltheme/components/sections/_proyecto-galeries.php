<?php
// isset($figcaption_exteriores) && $figcaption_exteriores !== '' || $figcaption_exteriores !== [] ? $figcaption_exteriores = json_decode($figcaption) : $figcaption = [];
$url360 = get_post_meta($post->ID, 'gs_url_360', true);
$urlBrochure = get_post_meta($post->ID, 'gs_url_brochure', true);
?>

<section class="grid grid-cols-1 gap-5 mt-20 lg:grid-cols-12">
    <h2 class="text-4xl text-center text-orangeG font-futuraBold lg:col-span-full">Galería</h2>
    <div class="flex flex-row flex-wrap justify-center px-3 lg:col-start-4 lg:px-0 lg:col-span-6 lg:justify-evenly text-greenG">
        <button class="px-4 py-1 m-1 transition-all border !text-orangeG !border-orangeG !border-[3px] rounded gs_galerie_buton border-greenG lg:px-5 font-futuraBold">Exteriores</button>
        <button class="px-4 py-1 m-1 transition-all border rounded gs_galerie_buton border-greenG lg:px-5 font-futuraBold">Planos</button>
        <button class="px-5 py-1 m-1 transition-all border rounded gs_galerie_buton border-greenG font-futuraBold">Inmueble</button>
        <a href="<?= $url360 ?>" target="_blank" class="px-4 py-1 m-1 transition-all border rounded gs_galerie_buton border-greenG lg:px-5 font-futuraBold">Recorrido 360</a>
        <a href="<?= $urlBrochure ?>" target="_blank" class="px-4 py-1 m-1 transition-all border rounded gs_galerie_buton border-greenG lg:px-5 font-futuraBold">Brochure</a>
    </div>
    <div class="relative bg-white shadow-lg lg:col-span-12">
        <?= get_template_part('components/sections/galeries/_g', 'exteriores') ?>
        <?= get_template_part('components/sections/galeries/_g', 'planos') ?>
        <?= get_template_part('components/sections/galeries/_g', 'inmueble') ?>

    </div>
</section>