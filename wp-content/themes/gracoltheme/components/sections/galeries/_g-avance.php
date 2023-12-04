<?php
$galeria_avance = $args['galeries'];
$fecha = $args['fecha'];
// dd($serialized_galeria_avance);
?>
    <div id="date_<?= $fecha ?>" class="relative flex flex-col w-full px-5 mx-auto mb-10 date_slider gs_slide animate__animated animate__faster animate__fadeInDown max-w-screen-2xl">
        <!-- thmbslider -->
        <div thumbsSlider="" class="my-8 swiper thumbSwiper-avance">
            <div class="swiper-wrapper !items-center !justify-center">
                <?php foreach ($galeria_avance as $key => $image_url) :
                ?>
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
                ?>
                    <div class="swiper-slide">
                        <figure>
                            <picture>
                                <img class="mx-auto lg:w-2/3 lazyload" src="low-quality.jpg" data-src="<?= $image_url ?>" />
                            </picture>
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