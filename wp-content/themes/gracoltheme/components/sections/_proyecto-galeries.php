<?php
// $galeria_inmueble = $args['galeria_inmueble'];
$serialized_galeria_inmueble = get_post_meta(get_the_ID(),  'project_galeria_inmueble', true);
$serialized_galeria_exteriores = get_post_meta(get_the_ID(),  'project_galeria_exteriores', true);
$serialized_galeria_planos = get_post_meta(get_the_ID(),  'project_galeria_planos', true);
// $galeria_inmueble = get_post_meta(get_the_ID(),  'project_galeria_inmueble', true);
$figcaption = get_post_meta(get_the_ID(), 'img_figcaption', true);


if (isset($serialized_galeria_inmueble[0]) && $serialized_galeria_inmueble[0] !== '') {
    $galeria_inmueble = json_decode($serialized_galeria_inmueble[0]);
} else {
    $galeria_inmueble = $serialized_galeria_inmueble;
}


if (isset($serialized_galeria_exteriores[0]) && $serialized_galeria_exteriores[0] !== '') {
    $galeria_exteriores = json_decode($serialized_galeria_exteriores[0]);
} else {
    $galeria_exteriores = $serialized_galeria_exteriores;
}


if (isset($serialized_galeria_planos[0]) && $serialized_galeria_planos[0] !== '') {
    $galeria_planos = json_decode($serialized_galeria_planos[0]);
} else {
    $galeria_planos = $serialized_galeria_planos;
}
?>

<section class="mt-20 grid grid-cols-12 gap-5">
    <h2 class="text-orangeG font-futuraBold text-4xl text-center col-span-full">Galería</h2>
    <div class="col-start-4 col-span-6 flex flex-row justify-evenly">
        <button class="gs_galerie_buton transition-all border !bg-orangeG !text-whiteG !border-orangeG border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Inmueble</button>
        <button class="gs_galerie_buton transition-all border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Exteriores</button>
        <button class="gs_galerie_buton transition-all border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Planos</button>
        <button class="gs_galerie_buton transition-all border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Recorrido 360</button>
        <button class="gs_galerie_buton transition-all border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Brochure</button>
    </div>
    <div class="bg-white relative shadow-lg col-span-12">

        <div id="img_interior" class="gs_slide animate__animated animate__faster animate__fadeInDown mb-10 w-2/3 mx-auto relative">
            <!-- thmbslider -->
            <div thumbsSlider="" class="swiper thumbSwiper my-8">
                <div class="swiper-wrapper !items-center !justify-center">
                    <?php foreach ($galeria_inmueble as $image_url) : ?>
                        <div class="swiper-slide !w-fit">
                            <img width="100px" src="<?= $image_url ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper swiper-single-project relative overflow-hidden">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($galeria_inmueble as $image_url) : ?>
                        <div class="swiper-slide">
                            <figure>
                                <picture>

                                    <img src="<?= $image_url ?>" />
                                </picture>
                                <figcaption class="text-2xl text-greenG-mid font-futuraBold"><?= $figcaption ?></figcaption>
                            </figure>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <div id="img_ext" class="gs_slide animate__animated animate__faster animate__fadeInDown hidden mb-10 w-2/3 mx-auto relative">
            <!-- thmbslider -->
            <div thumbsSlider="" class="swiper thumbSwiperExteriores my-8">
                <div class="swiper-wrapper !items-center !justify-center">
                    <?php foreach ($galeria_exteriores as $image_url) : ?>
                        <div class="swiper-slide !w-fit">
                            <img width="100px" src="<?= $image_url ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper swiper-single-project-exteriores relative overflow-hidden">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($galeria_exteriores as $image_url) : ?>
                        <div class="swiper-slide">
                            <figure>
                                <picture>

                                    <img src="<?= $image_url ?>" />
                                </picture>
                                <figcaption class="text-2xl text-greenG-mid font-futuraBold"><?= $figcaption ?></figcaption>
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
        <div id="img_planos" class="gs_slide animate__animated animate__faster animate__fadeInDown hidden mb-10 w-2/3 mx-auto relative">
            <!-- thmbslider -->
            <div thumbsSlider="" class="swiper thumbSwiper-planos my-8">
                <div class="swiper-wrapper !items-center !justify-center">
                    <?php foreach ($galeria_planos as $image_url) : ?>
                        <div class="swiper-slide !w-fit">
                            <img width="100px" src="<?= $image_url ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Slider main container -->
            <div class="swiper swiper-single-project-planos relative overflow-hidden">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($galeria_planos as $image_url) : ?>
                        <div class="swiper-slide">
                            <figure>
                                <picture>

                                    <img src="<?= $image_url ?>" />
                                </picture>
                                <figcaption class="text-2xl text-greenG-mid font-futuraBold"><?= $figcaption ?></figcaption>
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