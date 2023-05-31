<div class="fixed top-0 w-full hidden md:block z-50">
    <header class="bg-greenG text-whiteG h-[42px] w-full">
        <div class="m-auto justify-end h-full max-w-screen-xl flex flex-row items-center">
            <iconify-icon class="text-2xl" icon="carbon:logo-facebook"></iconify-icon>
            <iconify-icon class="mx-3 text-xl" icon="ri:instagram-line"></iconify-icon>
            <a class="" href="https://wa.me/523164906909">+52 316 4906909</a> <a class="ml-3" href="">mail@mail.com</a>
        </div>
    </header>
    <nav class="bg-white shadow-md w-full top-[42px]">
        <div class="max-w-screen-xl py-4 mx-auto text-greenG flex flex-row relative">
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