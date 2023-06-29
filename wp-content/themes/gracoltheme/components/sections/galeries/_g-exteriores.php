<?php
$serialized_galeria_exteriores = get_post_meta(get_the_ID(),  'project_galeria_exteriores', true);
$figcaption_exteriores = get_post_meta(get_the_ID(), 'img_figcaption-exterior', true);
try {
    $galeria_exteriores = gsSanitizer($serialized_galeria_exteriores[0]);
} catch (\Throwable $th) {
    //throw $th;
}
$figcaption_exteriores = gsSanitizer($figcaption_exteriores);

?>
<div id="img_ext" class="relative hidden w-2/3 px-5 mx-auto mb-10 gs_slide animate__animated animate__faster animate__fadeInDown max-w-screen-2xl">
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
    <div class="swiper-pagination swiper-pagination-ext"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev swiper-button-prev-ext"></div>
    <div class="swiper-button-next swiper-button-next-ext"></div>
</div>