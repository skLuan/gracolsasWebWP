<?php
$previous_url = wp_get_referer();
!$previous_url || !isset($previous_url) ? $previous_url = get_home_url() : '';
?>
<div class="fixed top-0 z-40 w-full">
    <header class="bg-greenG text-whiteG h-[42px] w-full">
        <div class="flex items-center justify-end hidden h-full max-w-screen-xl m-auto lg:block">
            <span>
                <iconify-icon class="text-2xl" icon="carbon:logo-facebook"></iconify-icon>
                <iconify-icon class="mx-3 text-2xl" icon="ri:instagram-line"></iconify-icon>
            </span>

            <a class="" href="https://wa.me/523164906909">+52 316 4906909</a> <a class="ml-3" href="mailto:servicioalcliente@gracolsas.com">servicioalcliente@gracolsas.com</a>
        </div>
        <div class="flex content-center justify-between block h-full px-4 m-auto lg:hidden">
            <a href="<?= $previous_url ?>" class="flex items-center">
                <iconify-icon class="text-2xl arrow-left " icon="material-symbols:keyboard-arrow-up-rounded"></iconify-icon>
                Regresar
            </a>
            <a href="<?= get_the_permalink(12) ?>" class="flex items-center underline font-futuraBold underline-offset-1 hover:text-orangeG">Soy Cliente</a>
        </div>
    </header>
    <nav class="bg-white shadow-md w-full top-[42px] hidden lg:block">
        <div class="relative flex flex-row max-w-screen-xl px-4 py-4 mx-auto text-greenG">
            <picture class="absolute top-0 left-0">
                <img src="<?= IMAGE . 'logoNav.png' ?>" alt="logoimg">
            </picture>
            <?php
            wp_nav_menu([
                'theme_location' => 'top_menu',
                'container' => false,
                'menu_class'     => 'flex flex-row ml-[255px]',
                'menu_id'        => 'navbar-menu',
                'add_li_class' => 'lg:px-3 mx-4 md:text-lg lg:text-xl hover:text-orangeG',
            ])
            ?>
            <div class="flex flex-row items-center ml-auto">
                <div class="w-[1px] h-full mx-2 bg-greenG"></div>
                <a class="md:text-lg hover:text-orangeG" href="<?= get_the_permalink(12) ?>">Portal clientes</a>
            </div>
            <div class="absolute right-0 flex p-2 mt-3 mr-5 bg-green-700 rounded top-full">
                <a href="" class="h-fit">
                    <iconify-icon class="m-auto text-5xl text-white " icon="ic:twotone-whatsapp"></iconify-icon>
                </a>
            </div>
        </div>
    </nav>
</div>