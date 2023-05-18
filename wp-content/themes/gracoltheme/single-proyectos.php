<?php get_header() ?>
<main class="mt-24">
    <?php while (have_posts()) :
        the_post();
        // -- Toma de precios
        $precio = get_post_meta(get_the_ID(), 'gs_precio_col', true);
        $precioSMLV = get_post_meta(get_the_ID(), 'gs_precio_SMLV', true);
        // -- Tags
        $tags = get_the_terms(get_the_ID(), 'tag-proyecto');

        // -- Amenities
        $amenities = get_the_terms(get_the_ID(), 'amenities');
    ?>
        <picture class="w-screen">
            <img class="w-full" src="<?= the_post_thumbnail_url('original') ?>" alt="">
        </picture>
        <section class="max-w-screen-2xl mx-auto bg-white px-5 rounded-sm shadow-lg relative grid gap-5 grid-cols-12 pb-5">
            <picture class="absolute -top-5"><img src="" alt=""></picture>
            <div class="pt-20 col-span-10 col-start-2">
                <h2 class="font-futuraBold text-5xl text-greenG-mid uppercase"><?= the_title() ?></h2>
                <h3 class="text-orangeG text-4xl font-futuraBold">Barrio <a class="text-grayG !font-futura ml-10" href="">Ciudad</a></h3>
            </div>
            <!-- --------------------------------------Descripción -->
            <article class="col-start-2 col-span-5 text-base">
                <?= the_content(); ?>
            </article>
            <!-- --------------------------------------Precios -->
            <section class="col-span-5 flex flex-col">
                <p class="text-center mx-auto">Cambio de moneda</p>
                <div class="flex flex-row">
                    <button class="ml-auto">COL</button>
                    <button class="mx-5">USD</button>
                    <button class="mr-auto">EUR</button>
                </div>
                <div class="flex flex-row mt-5 mx-auto">
                    <div class="mr-10 ml-auto">
                        <?php if (!empty($precioSMLV)) : ?>
                            <h3 class="text-orangeG text-3xl mx-auto text-center font-futuraBold"><?= $precioSMLV ?> SMMLV</h3>
                            <p class="text-[15px] text-center -mt-1 text-greenG underline">¿Cuánto vale un SMLV?</p>
                        <?php endif; ?>
                    </div>
                    <div class="mr-auto">
                        <?php if (!empty($precio)) : ?>
                            <h3 class="text-orangeG text-3xl font-futuraBold">$<?= $precio ?></h3>
                            <p class="text-base text-center -mt-1 text-greenG">Valor aproximado</p>
                        <?php endif; ?>
                    </div>
                </div>
                <a href="" class="bg-orangeG text-whiteG font-futuraBold mx-auto px-4 py-1 rounded mt-10">Escríbenos</a>
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
        <section class="mt-20 grid grid-cols-12 gap-5">
            <h2 class="text-orangeG font-futuraBold text-4xl text-center col-span-full">Galería</h2>
            <div class="col-start-4 col-span-6 flex flex-row justify-evenly">
                <button class="border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Inmueble</button>
                <button class="border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Exteriores</button>
                <button class="border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Planos</button>
                <button class="border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Recorrido 360</button>
                <button class="border border-greenG px-5 py-1 rounded font-futuraBold text-greenG">Brochure</button>
            </div>
            <div class="bg-white shadow-lg col-span-12">
                <div class=" mb-10 w-2/3 mx-auto relative">
                    <!-- thmbslider -->
                    <div thumbsSlider="" class="swiper thumbSwiper my-8">
                        <div class="swiper-wrapper !items-center !justify-center">
                            <div class="swiper-slide !w-fit">
                                <img width="100px" src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide !w-fit">
                                <img width="100px" src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide !w-fit">
                                <img width="100px" src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide !w-fit">
                                <img width="100px" src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide !w-fit">
                                <img width="100px" src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                        </div>
                    </div>
                    <!-- Slider main container -->
                    <div class="swiper swiper-single-project relative overflow-hidden">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                            </div>
                            <div class="swiper-slide">
                                <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>

            </div>
            <figure class="">
                <picture class="">
                    <img class="" src="" alt="">
                </picture>
            </figure>
            </div>
        </section>

        <section class="relative">

        </section>

        <section>
            ubicación
        </section>
    <?php
    endwhile; ?>
    <div class="bg-orangeG py-2 text-center text-white fixed bottom-0 w-full z-50">Escríbenos para más información <a href="" class="underline font-futuraBold ml-2 text-lg">Ir al formulario</a></div>
</main>
<?php get_footer() ?>