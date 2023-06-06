<?php
$previous_url = wp_get_referer();
// dd($previous_url);
!$previous_url || !isset($previous_url)? $previous_url = get_home_url(): ''; 
?>
<div class="fixed top-0 w-full z-40">
    <header class="bg-greenG text-whiteG h-[42px] w-full">
        <div class="m-auto justify-end h-full max-w-screen-xl flex items-center hidden lg:block">
            <span>
                <iconify-icon class="text-2xl" icon="carbon:logo-facebook"></iconify-icon>
                <iconify-icon class="mx-3 text-2xl" icon="ri:instagram-line"></iconify-icon>
            </span>

            <a class="" href="https://wa.me/523164906909">+52 316 4906909</a> <a class="ml-3" href="">mail@mail.com</a>
        </div>
        <div class="m-auto h-full flex justify-between content-center block lg:hidden px-4">
            <a href="<?= $previous_url ?>" class="flex items-center">
                <iconify-icon class="arrow-left text-2xl " icon="material-symbols:keyboard-arrow-up-rounded"></iconify-icon>
                Regresar
            </a>
            <a href="<?= get_the_permalink(12) ?>" class="flex items-center font-futuraBold underline underline-offset-1 hover:text-orangeG">Soy Cliente</a>
        </div>
    </header>
    <nav class="bg-white shadow-md w-full top-[42px] hidden lg:block">
        <div class="max-w-screen-xl py-4 mx-auto text-greenG flex flex-row relative px-4">
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
                <iconify-icon class="text-xl hover:text-orangeG" icon="bi:whatsapp"></iconify-icon>
                <div class="w-[1px] h-full mx-2 bg-greenG"></div>
                <a class="md:text-lg hover:text-orangeG" href="<?= get_the_permalink(12) ?>">Portal clientes</a>
            </div>
        </div>
    </nav>
</div>