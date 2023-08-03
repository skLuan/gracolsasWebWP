<?php
// -- Toma de precios
$precio = get_post_meta(get_the_ID(), 'gs_precio_col', true);
$precioSMLV = get_post_meta(get_the_ID(), 'gs_precio_SMLV', true);
$logo_project = get_post_meta(get_the_ID(), 'project_logo', true);
// -- Tags
//  echo var_dump($serialized_galeria_inmueble);
$tags = get_the_terms(get_the_ID(), 'tag-proyecto');
$parentTagID = 71;
$tipoProyecto = 12;
if($tags && isset($tags) && $tags[0]->parent !== $parentTagID) {
    $inmueble = $tags[0]->name;
} else if($tags[1]->parent == $tipoProyecto) {
    $inmueble = $tags[1]->name;
}
$inmueble === 'Casas' ? $typeIcon = 'clarity:house-solid' : $typeIcon = 'material-symbols:apartment';

// -- Amenities
$amenities = get_the_terms(get_the_ID(), 'amenities');

$gsBarrio = get_post_meta(get_the_ID(), 'gs_barrio', true);
$gsCiudad = get_post_meta(get_the_ID(), 'gs_ciudad', true);


$url = 'https://v6.exchangerate-api.com/v6/d25e2b95007cfbdeeb6abaac/latest/USD';  // URL de la API
// $response = file_get_contents($url);  // Realizar la llamada a la API
$response = false;  // Realizar la llamada a la API
if ($response !== false) {
    // La llamada a la API fue exitosa
    $data = json_decode($response, true);  // Decodificar la respuesta JSON en un array asociativo
    // Trabajar con los datos obtenidos de la API
    $USDCOP = $data['conversion_rates']['COP'];
    $USDEUR = $data['conversion_rates']['EUR'];
} else {
    // La llamada a la API falló
    // Manejar el error adecuadamente
    $USDCOP = 4450;
    $USDEUR = 0.9337;
}
$precio_num = str_replace(".", "", $precio); // Eliminar los puntos
$precio_num = floatval($precio_num);
$precioUS = $precio_num / $USDCOP;


$precioEUR = $precioUS * $USDEUR;
$precioUS = number_format($precioUS, 0, ',', '.');
$precioEUR = number_format($precioEUR, 0, ',', '.');
$precio = number_format($precio_num, 0, ',', '.');


$noAlcobas = get_post_meta(get_the_ID(), 'gs_noAlcobas', true);
$mt2 = get_post_meta(get_the_ID(), 'gs_mt2', true);

?>
<section class="relative grid grid-cols-1 gap-5 pb-10 mx-5 bg-white rounded-sm shadow-lg max-w-screen-2xl lg:mx-auto lg:px-5 lg:grid-cols-12">
    <!-- -------------------------------------------- Logo -->
    <picture class="bg-white p-5 lg:left-[63%] right-5 lg:right-[unset] -top-[165px] shadow-lg rounded absolute lg:-top-20">
        <img class="w-[100px] lg:w-[170px] lazyload" src="low-quality.jpg" data-src="<?= $logo_project ?>" alt="logo of the project">
    </picture>
    <div class="px-5 pt-10 lg:pt-20 lg:col-span-5 lg:col-start-2">
        <h2 class="text-3xl text-left uppercase font-futuraBold lg:text-5xl text-greenG-mid"><?= the_title() ?></h2>
        <h3 class="text-xl text-left text-orangeG lg:text-4xl font-futuraBold"><?= $gsBarrio ?> <span class="text-grayG !font-futura ml-2 lg:ml-5"><?= $gsCiudad ?></span></h3>
    </div>
    <!-- --------------------------------------Descripción -->
    <article class="px-5 text-base text-justify lg:col-start-2 lg:col-span-5">
        <?= the_content(); ?>
    </article>
    <!-- --------------------------------------Precios -->
    <section class="flex flex-col my-10 lg:col-span-5 lg:my-0">
        <p class="mx-auto text-base text-center text-greenG">Cambio de moneda</p>
        <div class="flex flex-row mt-2 font-futuraBold text-greenG">
            <button name="gsCol" value="<?= $precio ?>" class="gs_price_button !border-[3px] !text-orangeG !border-orangeG border border-greenG rounded px-4 py-1 ml-auto">COL</button>
            <button name="gsUSD" value="<?= $precioUS ?>" class="px-4 py-1 mx-5 border rounded gs_price_button border-greenG">USD</button>
            <button name="gsEUR" value="<?= $precioEUR ?>" class="px-4 py-1 mr-auto border rounded gs_price_button border-greenG">EUR</button>
        </div>
        <div class="flex flex-col mx-auto mt-5 lg:flex-row">
            <div class="mx-auto lg:mr-10">
                <?php if (!empty($precioSMLV)) : ?>
                    <h3 class="mx-auto text-3xl text-center text-orangeG font-futuraBold"><?= $precioSMLV ?> SMMLV*</h3>
                    <P class="text-sm">* Del año de escrituración del inmueble</P>
                <?php endif; ?>
            </div>
            <div class="mr-auto">
                <?php if (!empty($precio)) : ?>
                    <h3 id="gs_priceSelector" class="text-3xl text-orangeG font-futuraBold">$<?= $precio ?></h3>
                    <p class="-mt-1 text-base text-center text-greenG">Valor aproximado</p>
                <?php endif; ?>
            </div>
        </div>
        <p class="text-center mt-14">¿Quieres mas información del proyecto? </p>
        <a href="#gs_FormProject" class="px-8 py-3 mx-auto mt-3 text-2xl rounded btn-bounty bg-orangeG text-whiteG font-futuraBold">Regístrate</a>
    </section>
    <!-- -------------------------------------- Amenities -->
    <section class="px-3 text-xl lg:col-start-3 lg:px-0 lg:col-span-9 text-greenG-mid">
        <div class="h-[1px] w-full bg-greenG my-12"></div>
        <div class="grid grid-cols-1 gap-1 lg:grid-cols-3 gap-y-6 lg:gap-y-16">

            <div class="flex flex-row items-center">
                <iconify-icon class="text-greenG ml-5 mr-3 text-4xl lg:text-6xl w-[40px] lg:w-[60px]" icon="<?= $typeIcon ?>"></iconify-icon>
                <b class="pl-3 text-greenG"><?= $inmueble ?></b></p>
            </div>
            <div class="flex flex-row items-center">
                <iconify-icon class="ml-5 mr-3 text-4xl text-greenG lg:text-6xl" icon="material-symbols:bed"></iconify-icon>
                <p class="pl-3 lg:text-2xl"><b class=""><?= $noAlcobas ?></b><span class=""> Alcobas</span></p>
            </div>
            <div class="flex flex-row items-center">
                <iconify-icon class="ml-5 mr-3 text-4xl text-greenG lg:text-6xl" icon="tabler:ruler-measure"></iconify-icon>
                <p class="pl-3 lg:text-2xl"><b class=""><?= $mt2 ?></b> Mt2</p>
            </div>
            <?php
            if (!empty($amenities)) :
                foreach ($amenities as $amenitie) :
                    $image_url = get_term_meta($amenitie->term_id, 'imagen_taxonomy', true);
            ?>
                    <div class="flex flex-row items-center">
                        <figure class="ml-5">
                            <picture>
                                <img class="lazyload max-w-none w-[40px] lg:w-[60px]" width="" src="low-quality.jpg" data-src="<?= $image_url ?>" alt="">
                            </picture>
                        </figure>
                        <span class="pl-6 lg:text-2xl"><?= $amenitie->name ?></span>
                    </div>
            <?php endforeach;
            endif; ?>
        </div>
    </section>
</section>