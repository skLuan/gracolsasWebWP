<!-- footer -->
<footer class="bg-greenG text-whiteG mt-2 relative overflow-hidden pb-14">
    <picture class="absolute top-0 right-0 2xl:right-[unset] 2xl:left-0">
        <img class="max-w-[1900px]" src="<?= IMAGE . '/footer-bg.png' ?>" alt="">
    </picture>
    <section class="max-w-screen-2xl w-full mx-auto px-5 pt-10 z-10 relative">
        <picture class="">
            <img class="mb-5 w-64" src="<?= IMAGE . '/logo-white.png' ?>" alt="">
        </picture>
        <div class="flex flex-row w-5/6 mx-auto">
            <div class="pl-10">
                <div class="flex flex-col">
                    <div class="flex flex-row items-center">
                        <iconify-icon class="text-2xl mr-5" icon="carbon:logo-facebook"></iconify-icon>
                        <iconify-icon class=" text-xl" icon="ri:instagram-line"></iconify-icon>
                    </div>
                    <a class="" href="https://wa.me/523164906909">+52 316 4906909</a> <a class="" href="">mail@mail.com</a>
                </div>
            </div>
            <div class="">
                <?php
                wp_nav_menu([
                    'theme_location' => 'footer_menu',
                    'container' => false,
                    'menu_class'     => 'grid grid-rows-3 grid-cols-2 grid-flow-col gap-5 gap-y-2',
                    'menu_id'        => 'navbar-menu',
                    'add_li_class' => 'lg:px-3 mx-4 md:text-lg lg:text-xl hover:text-orangeG',
                ])
                ?>
            </div>
        </div>
    </section>
</footer>

<?php wp_footer() ?>
</body>

</html>