<?php
$serialized_galeria_inmueble = get_post_meta(get_the_ID(),  'project_galeria_inmueble', true);
$figcaption_interior = get_post_meta(get_the_ID(), 'img_figcaption-interior', true);
try {
    $galeria_inmueble = gsSanitizer($serialized_galeria_inmueble[0]);
} catch (\Throwable $th) {
    //throw $th;
}
$figcaption_interior = gsSanitizer($figcaption_interior);
?>
<div id="img_interior" class="relative w-2/3 px-5 mx-auto mb-10 gs_slide animate__animated animate__faster animate__fadeInDown max-w-screen-2xl">
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
    <div class="swiper-pagination swiper-pagination-inmueble"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev swiper-button-prev-inmueble"></div>
    <div class="swiper-button-next swiper-button-next-inmueble"></div>
</div>