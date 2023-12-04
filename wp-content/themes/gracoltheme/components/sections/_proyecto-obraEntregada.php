<?php get_header();
$actualBanner = IMAGE . 'baner_Entregadas.png';
$mobileBanner = IMAGE . 'baner_EntregadasMObile.png';
$projectID = get_the_ID();
$avanceID = get_post_meta($projectID, 'p_avance_id', true);
$galeria_avance = get_post_meta($avanceID,  'galeria_avance', true);
$fechas = ['Finalizacion del proyecto'];
$galerias = [];
if (isset($galeria_avance) && $galeria_avance !== '') {
    try {
        foreach ($galeria_avance as $key => $avance) {
            $galerias[] = json_decode($avance['galery']);
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}
$logoProjectUrl = get_post_meta($projectID, 'project_logo', true);
?>
<main class="w-full lg:mt-16">
    <section class="w-full">
        <figure class="">
            <picture>
                <source media="(max-width: 500px)" data-srcset="<?= $mobileBanner ?>">
                <img class="w-full lazyload" data-src="<?= $actualBanner ?>" alt="banner">
            </picture>
        </figure>
    </section>
    <section class="flex my-10">
        <figure class="p-5 mx-auto bg-white rounded shadow w-72">
            <picture>
                <img class="w-full lazyload" data-src="<?= $logoProjectUrl ?>" alt="logo project">
            </picture>
        </figure>
    </section>
    <?= get_template_part('components/sections/_loop', 'lineatiempo', ['fechas' => $fechas, 'title' => 'Obra finalizada']) ?>
    <section id="obra-entregada" class="pb-5 mx-auto my-5 bg-white shadow-lg max-w-screen-2xl">
        <?php
        foreach ($galerias as $i => $galeria) {
            $fecha = $fechas[$i];
            get_template_part('components/sections/galeries/_g', 'avance', ['galeries' => $galeria, 'fecha' => $fecha]);
        }
        ?>
    </section>
</main>
<?php get_footer() ?>