<?php
$previous_url = wp_get_referer();
!$previous_url || !isset($previous_url) ? $previous_url = get_home_url() : '';
?>
<div class="fixed top-0 z-50 w-full">
    <!-- <header class="bg-greenG text-whiteG h-[42px] w-full">
        <div class="flex items-center justify-end hidden h-full max-w-screen-md pl-10 m-auto lg:flex lg:justify-start">
            <a class="my-auto " href="https://wa.me/<?= NUM_SERVICIOCLIENTE ?>"><?= NUM_SERVICIOCLIENTE_PRINT ?></a>
            <a class="mb-1 ml-3 text-center" href="mailto:servicioalcliente@gracolsas.com">servicioalcliente@gracolsas.com</a>
        </div>
        <div class="flex content-center justify-between h-full px-4 m-auto lg:hidden">
            <a href="<?= $previous_url ?>" class="flex items-center">
                <iconify-icon class="text-2xl arrow-left " icon="material-symbols:keyboard-arrow-up-rounded"></iconify-icon>
                Regresar
            </a>
        </div>
    </header> -->
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
                <a href="<?= FACEBOOK_URL ?>" class="flex "><iconify-icon class="my-auto text-2xl" icon="carbon:logo-facebook"></iconify-icon></a>
                <a href="<?= INSTAGRAM_URL ?>" class="flex ml-1"><iconify-icon class="my-auto text-2xl" icon="ri:instagram-line"></iconify-icon></a>
                <div class="w-[1px] h-full mx-2 bg-greenG"></div>
                <a class="md:text-lg hover:text-orangeG" href="<?= get_the_permalink(12) ?>">Portal clientes</a>
            </div>
            <?= get_template_part('components/misc/_btn', 'whatsapp') ?>
        </div>
    </nav>
</div>