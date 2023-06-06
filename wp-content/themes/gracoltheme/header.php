<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body class="bg-whiteG w-full">
    <div class="fixed top-0 w-full z-40">
        <header class="bg-greenG text-whiteG h-[42px] w-full">
            <div class="m-auto justify-end h-full max-w-screen-xl flex flex-row items-center">
                <iconify-icon class="text-2xl" icon="carbon:logo-facebook"></iconify-icon>
                <iconify-icon class="mx-3 text-xl" icon="ri:instagram-line"></iconify-icon>
                <a class="" href="https://wa.me/523164906909">+52 316 4906909</a> <a class="ml-3" href="">mail@mail.com</a>
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
    <div class="fixed bottom-0 w-full z-50 block lg:hidden">
        <nav class="bg-greenG h-[66px] w-full border-t-2 border-orangeG flex justify-between content-center">
            <a href="#" class="flex items-center px-4 text-greenG-light hover:text-whiteG"><iconify-icon class="text-5xl" icon="ic:outline-whatsapp"></iconify-icon><span class="font-futuraBold underline underline-offset-1">Escríbenos</span></a>
            <button onclick="openNav()" class="openbtn flex items-center px-4 text-whiteG hover:text-orangeG" ><iconify-icon class="text-6xl " icon="eva:menu-fill"></iconify-icon></button>
        </nav>
    </div>

    <div id="sidepanel" class="mobile-nav__wrapper">
        <div id="overlay" class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content bg-white border-l-2 border-orangeG grid content-between">
            <div>
                <a href="#"><img src="<?= IMAGE . 'logoNavBar.svg' ?>" alt="Gracol logo"></a>
                <div class="w-full h-auto p-3 text-greenG-Olive">
                    <p>
                        <iconify-icon class="text-2xl" icon="ic:baseline-facebook"></iconify-icon>
                        <iconify-icon class="mx-3 text-2xl" icon="basil:instagram-solid"></iconify-icon>
                    </p>
                    <p>+0 00 000</p>
                    <p>mail@mail.com</p>
                </div>
            </div>
            <div class="p-3 pb-10 mb-10 font-futuraBold text-greenG">
            <?php
                wp_nav_menu([
                    'theme_location' => 'mobile_menu',
                    'container' => false,
                    'menu_class'     => 'mobile_menu',
                    'menu_id'        => '',
                    'add_li_class' => '',
                ])
                ?>
            </div>
        </div>
    </div>
    
    <?php
    wp_body_open();
    ?>