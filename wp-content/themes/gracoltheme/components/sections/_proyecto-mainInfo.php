<?php
// -- Toma de precios
$precio = get_post_meta(get_the_ID(), 'gs_precio_col', true);
$precioSMLV = get_post_meta(get_the_ID(), 'gs_precio_SMLV', true);
$logo_project = get_post_meta(get_the_ID(), 'project_logo', true);
// -- Tags
//  echo var_dump($serialized_galeria_inmueble);
$tags = get_the_terms(get_the_ID(), 'tag-proyecto');

// -- Amenities
$amenities = get_the_terms(get_the_ID(), 'amenities');

$gsBarrio = get_post_meta(get_the_ID(), 'gs_barrio', true);
$gsCiudad = get_post_meta(get_the_ID(), 'gs_ciudad', true);


$url = 'https://v6.exchangerate-api.com/v6/d25e2b95007cfbdeeb6abaac/latest/USD';  // URL de la API
$response = file_get_contents($url);  // Realizar la llamada a la API
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



?>
<section class="max-w-screen-2xl mx-auto bg-white px-5 rounded-sm shadow-lg relative grid gap-5 grid-cols-12 pb-5">
    <!-- -------------------------------------------- Logo -->
    <picture class="bg-white p-5 left-[63%] shadow-lg rounded absolute -top-20"><img class="w-[170px]" src="<?= $logo_project ?>" alt=""></picture>
    <div class="pt-20 col-span-5 col-start-2">
        <h2 class="font-futuraBold text-5xl text-greenG-mid uppercase"><?= the_title() ?></h2>
        <h3 class="text-orangeG text-4xl font-futuraBold"><?= $gsBarrio ?> <span class="text-grayG !font-futura ml-10"><?= $gsCiudad ?></span></h3>
    </div>
    <!-- --------------------------------------Descripción -->
    <article class="col-start-2 col-span-5 text-base text-justify">
        <?= the_content(); ?>
    </article>
    <!-- --------------------------------------Precios -->
    <section class="col-span-5 flex flex-col">
        <p class="text-center mx-auto">Cambio de moneda</p>
        <div class="flex flex-row mt-2">
            <button name="gsCol" value="<?= $precio ?>" class="gs_price_button bg-orangeG text-white !border-orangeG border border-greenG rounded px-4 py-1 ml-auto">COL</button>
            <button name="gsUSD" value="<?= $precioUS ?>" class="gs_price_button   border border-greenG rounded px-4 py-1 mx-5">USD</button>
            <button name="gsEUR" value="<?= $precioEUR ?>" class="gs_price_button  border border-greenG rounded px-4 py-1 mr-auto">EUR</button>
        </div>
        <div class="flex flex-row mt-5 mx-auto">
            <div class="mr-10 ml-auto">
                <?php if (!empty($precioSMLV)) : ?>
                    <h3 class="text-orangeG text-3xl mx-auto text-center font-futuraBold"><?= $precioSMLV ?> SMMLV</h3>
                    <a href="https://www.mintrabajo.gov.co/prensa/comunicados/2022/diciembre/-1.160.000-ser%C3%A1-el-salario-minimo-para-2023-y-auxilio-de-transporte-por-140.606" target="_blank" class="text-[15px] text-center -mt-1 text-greenG underline">¿Cuánto vale un SMLV?</a>
                <?php endif; ?>
            </div>
            <div class="mr-auto">
                <?php if (!empty($precio)) : ?>
                    <h3 id="gs_priceSelector" class="text-orangeG text-3xl font-futuraBold">$<?= $precio ?></h3>
                    <p class="text-base text-center -mt-1 text-greenG">Valor aproximado</p>
                <?php endif; ?>
            </div>
        </div>
        <a href="#gs_FormProject" class="bg-orangeG text-whiteG font-futuraBold mx-auto px-4 py-1 rounded mt-10">Escríbenos</a>
    </section>
    <!-- -------------------------------------- Amenities -->
    <section class="col-start-3 col-span-9">
        <div class="h-[1px] w-full bg-greenG my-12"></div>
        <div class="grid grid-cols-3 gap-1 gap-y-16">
            <?php
            if (!empty($amenities)) :
                foreach ($amenities as $amenitie) :
                    $image_url = get_term_meta($amenitie->term_id, 'imagen_taxonomy', true);
            ?>
                    <div class="flex flex-row items-center">
                        <figure>
                            <picture>
                                <img class="" width="60px" src="<?= $image_url ?>" alt="">
                            </picture>
                        </figure>
                        <span class="text-2xl pl-6"><?= $amenitie->name ?></span>
                    </div>
            <?php endforeach;
            endif; ?>
        </div>
    </section>
</section>