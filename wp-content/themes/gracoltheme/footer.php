<!-- footer -->
<footer class="bg-greenG text-whiteG mt-2 relative overflow-hidden pb-14">
    <picture class="absolute top-0 right-0 2xl:right-[unset] 2xl:left-0">
        <img class="max-w-[1900px]" src="<?= IMAGE . '/footer-bg.png' ?>" alt="">
    </picture>
    <section class="max-w-screen-2xl w-full text-lg mx-auto px-5 pt-10 z-10 relative">
        <picture class="">
            <img class="mb-5 w-64" src="<?= IMAGE . '/logo-white.png' ?>" alt="">
        </picture>
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-x-5 lg:w-11/12 mx-auto">
            <div class="w-full">
                <h6 class="lg:text-xl mb-2 uppercase font-futuraBold">Oficina</h6>
                <div class="flex flex-row items-center">
                    <iconify-icon class="mr-1" icon="mdi:location"></iconify-icon> Carrera 17N #19N - 238
                </div>
                <p class="ml-5">Barrio Campamento
                </p>
                <p class="ml-5">Popayán
                </p>
                <div class="flex flex-row items-center">
                    <iconify-icon class="mr-1" icon="ic:round-phone"></iconify-icon>
                    <a class="" href="https://wa.me/523164906909">+52 316 4906909</a>
                </div>
                <div class="flex flex-row items-center">
                    <iconify-icon class="mr-1" icon="tabler:mail-filled"></iconify-icon>
                    <a class="" href="">servicioalcliente@gracolsas.com</a>
                </div>

                <h6 class="lg:text-xl mt-5 uppercase font-futuraBold">Síguenos</h6>
                <div class="flex flex-col">
                    <div class="flex flex-row items-center ml-5">
                        <iconify-icon class=" text-2xl mr-5" icon="carbon:logo-facebook"></iconify-icon>
                        <iconify-icon class=" text-xl" icon="ri:instagram-line"></iconify-icon>
                    </div>
                </div>
            </div>
            <div class="w-full mt-5">
                <h6 class="lg:text-xl uppercase font-futuraBold">Salas de venta</h6>
                <div class="flex flex-row items-center">
                    <iconify-icon class="mr-1" icon="mdi:location"></iconify-icon>
                    <div>
                        <b>Popayán</b>
                        <p>Calle 34N con carrera 13(esquina)</p>
                        <p>Barrio Campamento</p>
                    </div>
                </div>
                <div class="flex flex-row items-center">
                    <iconify-icon class="mr-1" icon="mdi:location"></iconify-icon>
                    <div>
                        <b>Jamundí</b>
                        <p>Carrera 6 sur #10C-20</p>
                        <p>Barrio Portal de Jamundí etapa 3</p>
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