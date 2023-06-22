<?php

$serialized_galeria_avance = get_post_meta(get_the_ID(),  'galeria_avance', true);
$figcaption_avance = get_post_meta(get_the_ID(), 'figcaption_avance', true);
!isset($figcaption_avance) ? $figcaption_avance = [] : '';
if (isset($serialized_galeria_avance[0]) && $serialized_galeria_avance[0] !== '') {
    $galeria_avance = json_decode($serialized_galeria_avance[0]);
} else {
    $galeria_avance = $serialized_galeria_planos;
}
$figcaption_avance = gsSanitizer($figcaption_avance);
?>
<div id="img_avance" class="relative flex flex-col w-full px-5 mx-auto mb-10 gs_slide animate__animated animate__faster animate__fadeInDown max-w-screen-2xl">
    <!-- thmbslider -->
    <div thumbsSlider="" class="my-8 swiper thumbSwiper-avance">
        <div class="swiper-wrapper !items-center !justify-center">
            <?php foreach ($galeria_avance as $image_url) : ?>
                <div class="swiper-slide !w-fit cursor-pointer">
                    <img class="lazyload" width="100px" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Slider main container -->
    <div class="relative overflow-hidden swiper !mx-0 swiper-single-project-avance">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <?php foreach ($galeria_avance as $i => $image_url) :
                if ($figcaption_avance == '') {
                    $figcaption_avance = [];
                }
                if (count($figcaption_avance) == 0 || $figcaption_avance[$i - 1] == '')
                    array_push($figcaption_avance, '');
            ?>
                <div class="swiper-slide">
                    <figure>
                        <picture>
                            <img class="mx-auto lazyload" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                        </picture>
                        <figcaption class="text-2xl text-greenG-mid font-futuraBold"><?= htmlspecialchars($figcaption_avance[$i], ENT_QUOTES, 'UTF-8') ?></figcaption>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination swiper-pagination-avance"></div>
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev swiper-button-prev-avance"></div>
    <div class="swiper-button-next swiper-button-next-avance"></div>
</div>