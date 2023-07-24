<!-- footer -->
<footer class="relative pb-32 mt-2 overflow-hidden bg-greenG text-whiteG">
    <picture class="absolute top-0 right-0 2xl:right-[unset] 2xl:left-0">
        <img class="max-w-[1900px]" src="<?= IMAGE . '/footer-bg.png' ?>" alt="">
    </picture>
    <section class="relative z-10 w-full px-5 pt-10 mx-auto text-lg max-w-screen-2xl">
        <picture class="">
            <img class="w-64 mb-5" src="<?= IMAGE . '/logo-white.png' ?>" alt="">
        </picture>
        <div class="grid grid-cols-1 mx-auto lg:grid-cols-4 gap-x-5 lg:w-11/12">
            <div class="w-full mt-5">
                <h6 class="uppercase lg:text-xl font-futuraBold">Oficina principal</h6>
                <div class="flex flex-row mt-1 mb-3">
                    <iconify-icon class="mr-1" icon="mdi:location"></iconify-icon>
                    <p class="leading-tight">
                        <b>Popayán</b>
                        <br>
                        Carrera 17N #19N - 238
                        <br>
                        Barrio Campamento
                    </p>
                </div>
                <div class="flex flex-row items-center mb-3">
                    <iconify-icon class="mr-1" icon="ic:round-phone"></iconify-icon>
                    <a class="" href="https://wa.me/<?= NUM_SERVICIOCLIENTE ?>"><?= NUM_SERVICIOCLIENTE_PRINT ?></a>
                </div>
                <div class="flex flex-row items-center">
                    <iconify-icon class="mr-1" icon="tabler:mail-filled"></iconify-icon>
                    <a class="" href="mailto:servicioalcliente@gracolsas.com">servicioalcliente@gracolsas.com</a>
                </div>
                <h6 class="mt-5 uppercase lg:text-xl font-futuraBold">Síguenos</h6>
                <div class="flex flex-col">
                    <div class="flex flex-row items-center mt-3 ml-5">

                        <a href="<?= FACEBOOK_URL ?>">
                            <iconify-icon class="mr-5 text-2xl " icon="carbon:logo-facebook"></iconify-icon>
                        </a>
                        <a href="<?= INSTAGRAM_URL ?>">
                            <iconify-icon class="mr-5 text-xl" icon="ri:instagram-line"></iconify-icon>
                        </a>
                        <a href="">
                            <iconify-icon class="text-2xl" icon="mdi:youtube"></iconify-icon>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full mt-5">
                <h6 class="uppercase lg:text-xl font-futuraBold">Salas de venta</h6>
                <div class="flex flex-row mb-3">
                    <iconify-icon class="mt-1 mr-1" icon="mdi:location"></iconify-icon>
                    <div>
                        <b>Popayán</b>
                        <p class="leading-tight">
                            Calle 34N con carrera 13(esquina)
                            <br>
                            Barrio Campamento
                        </p>
                    </div>
                </div>
                <div class="flex flex-row mb">
                    <iconify-icon class="mt-1 mr-1" icon="mdi:location"></iconify-icon>
                    <div>
                        <b>Jamundí</b>
                        <p class="leading-tight">Carrera 6 sur #10C-20
                            <br>
                            Barrio Portal de Jamundí etapa 3
                        </p>
                    </div>
                </div>
            </div>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer_menu',
                'container' => false,
                'menu_class'     => 'lg:col-span-2 grid lg:grid-cols-2 grid-row-auto lg:grid-flow-col gap-5 gap-y-2',
                'menu_id'        => 'footer-menu',
                'add_li_class' => 'lg:mx-4 text-lg',
            ]);
            ?>
        </div>
    </section>
</footer>

<?php wp_footer() ?>
</body>

</html>