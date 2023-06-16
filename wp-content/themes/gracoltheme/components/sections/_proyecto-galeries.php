<?php
// $galeria_inmueble = $args['galeria_inmueble'];
$serialized_galeria_inmueble = get_post_meta(get_the_ID(),  'project_galeria_inmueble', true);
$serialized_galeria_exteriores = get_post_meta(get_the_ID(),  'project_galeria_exteriores', true);
$serialized_galeria_planos = get_post_meta(get_the_ID(),  'project_galeria_planos', true);
// $galeria_inmueble = get_post_meta(get_the_ID(),  'project_galeria_inmueble', true);
$figcaption_interior = get_post_meta(get_the_ID(), 'img_figcaption-interior', true);
$figcaption_exteriores = get_post_meta(get_the_ID(), 'img_figcaption-exterior', true);
$figcaption_planos = get_post_meta(get_the_ID(), 'img_figcaption-planos', true);

// isset($figcaption_exteriores) && $figcaption_exteriores !== '' || $figcaption_exteriores !== [] ? $figcaption_exteriores = json_decode($figcaption) : $figcaption = [];
$url360 = get_post_meta($post->ID, 'gs_url_360', true);
$urlBrochure = get_post_meta($post->ID, 'gs_url_brochure', true);
function gsSanitizer($rawData = null)
{
    $clean = null;
    isset($rawData) && $rawData !== '' ? $clean = json_decode($rawData)
        : $clean = $rawData;
    return $clean;
}

try {
    $galeria_inmueble = gsSanitizer($serialized_galeria_inmueble[0]);
    $galeria_exteriores = gsSanitizer($serialized_galeria_exteriores[0]);
} catch (\Throwable $th) {
    //throw $th;
}

$figcaption_exteriores = gsSanitizer($figcaption_exteriores);
$figcaption_interior = gsSanitizer($figcaption_interior);
$figcaption_planos = gsSanitizer($figcaption_planos);


if (isset($serialized_galeria_planos[0]) && $serialized_galeria_planos[0] !== '') {
    $galeria_planos = json_decode($serialized_galeria_planos[0]);
} else {
    $galeria_planos = $serialized_galeria_planos;
}
?>

<section class="grid grid-cols-1 gap-5 mt-20 lg:grid-cols-12">
    <h2 class="text-4xl text-center text-orangeG font-futuraBold lg:col-span-full">Galería</h2>
    <div class="flex flex-row flex-wrap justify-center px-3 lg:col-start-4 lg:px-0 lg:col-span-6 lg:justify-evenly text-greenG">
        <button class="gs_galerie_buton transition-all m-1 border !text-orangeG !border-[3px] !border-orangeG border-greenG px-5 py-1 rounded font-futuraBold">Inmueble</button>
        <button class="px-4 py-1 m-1 transition-all border rounded gs_galerie_buton border-greenG lg:px-5 font-futuraBold">Exteriores</button>
        <button class="px-4 py-1 m-1 transition-all border rounded gs_galerie_buton border-greenG lg:px-5 font-futuraBold">Planos</button>
        <a href="<?= $url360 ?>" target="_blank" class="px-4 py-1 m-1 transition-all border rounded gs_galerie_buton border-greenG lg:px-5 font-futuraBold">Recorrido 360</a>
        <a href="<?= $urlBrochure ?>" target="_blank" class="px-4 py-1 m-1 transition-all border rounded gs_galerie_buton border-greenG lg:px-5 font-futuraBold">Brochure</a>
    </div>
    <div class="relative bg-white shadow-lg lg:col-span-12">

        <div id="img_interior" class="relative w-full px-5 mx-auto mb-10 gs_slide animate__animated animate__faster animate__fadeInDown max-w-screen-2xl">
            <!-- thmbslider -->
            <div thumbsSlider="" class="my-8 swiper thumbSwiper">
                <div class="swiper-wrapper !items-center !justify-center">
                    <?php foreach ($galeria_inmueble as $image_url) : ?>
                        <div class="swiper-slide !w-fit">
                            <img class="lazyload" width="100px" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="relative overflow-hidden swiper swiper-single-project">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->

                    <?php
                    if (is_array($galeria_inmueble)) :
                        foreach ($galeria_inmueble as $i => $image_url) : ?>
                            <div class="swiper-slide">
                                <figure class="overflow-hidden rounded-lg ">
                                    <picture>
                                        <img class="max-w-full rounded-lg lazyload" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                                    </picture>
                                    <figcaption class="text-2xl text-greenG-mid font-futuraBold"><?= htmlspecialchars($figcaption_interior[$i], ENT_QUOTES, 'UTF-8') ?></figcaption>
                                </figure>
                            </div>
                    <?php endforeach;
                    else :
                        echo 'No hay Imagenes';
                    endif; ?>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div id="img_ext" class="relative hidden w-full px-5 mx-auto mb-10 gs_slide animate__animated animate__faster animate__fadeInDown max-w-screen-2xl">
            <!-- thmbslider -->
            <div thumbsSlider="" class="my-8 swiper thumbSwiperExteriores">
                <div class="swiper-wrapper !items-center !justify-center">
                    <?php foreach ($galeria_exteriores as $image_url) : ?>
                        <div class="swiper-slide !w-fit">
                            <img class="lazyload" width="100px" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="relative overflow-hidden swiper swiper-single-project-exteriores">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($galeria_exteriores as $i => $image_url) : ?>
                        <div class="swiper-slide">
                            <figure>
                                <picture>
                                    <img class="lazyload" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                                </picture>
                                <figcaption class="text-2xl text-greenG-mid font-futuraBold"><?= htmlspecialchars($figcaption_exteriores[$i], ENT_QUOTES, 'UTF-8') ?></figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination-ext"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev-ext"></div>
            <div class="swiper-button-next-ext"></div>
        </div>
        <div id="img_planos" class="relative hidden w-full px-5 mx-auto mb-10 gs_slide animate__animated animate__faster animate__fadeInDown max-w-screen-2xl">
            <!-- thmbslider -->
            <div thumbsSlider="" class="my-8 swiper thumbSwiper-planos">
                <div class="swiper-wrapper !items-center !justify-center">
                    <?php foreach ($galeria_planos as $image_url) : ?>
                        <div class="swiper-slide !w-fit">
                            <img class="lazyload" width="100px" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="relative overflow-hidden swiper swiper-single-project-planos">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($galeria_planos as $i => $image_url) : ?>
                        <div class="swiper-slide">
                            <figure>
                                <picture>

                                    <img class="lazyload" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                                </picture>
                                <figcaption class="text-2xl text-greenG-mid font-futuraBold"><?= htmlspecialchars($figcaption_planos[$i], ENT_QUOTES, 'UTF-8') ?></figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination-planos"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev-planos"></div>
            <div class="swiper-button-next-planos"></div>
        </div>
    </div>
</section>