<?php

$serialized_galeria_planos = get_post_meta(get_the_ID(),  'project_galeria_planos', true);
$figcaption_planos = get_post_meta(get_the_ID(), 'img_figcaption-planos', true);
if (isset($serialized_galeria_planos[0]) && $serialized_galeria_planos[0] !== '') {
    $galeria_planos = json_decode($serialized_galeria_planos[0]);
} else {
    $galeria_planos = $serialized_galeria_planos;
}
$figcaption_planos = gsSanitizer($figcaption_planos);
?>
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