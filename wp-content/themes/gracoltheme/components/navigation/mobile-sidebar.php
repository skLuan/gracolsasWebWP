<aside id="sidepanel" class="mobile-nav__wrapper">
    <div id="overlay" class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="mobile-nav__content bg-white border-l-2 border-greenG grid content-between">
        <div>
            <a href="<?= home_url() ?>" class=""><img class="w-full" src="<?= IMAGE . 'logoNavBar.svg' ?>" alt="Gracol logo"></a>
            <div class="w-full h-auto pl-5 mt-3 text-greenG">
                <p>
                    <iconify-icon class="text-2xl" icon="ic:baseline-facebook"></iconify-icon>
                    <iconify-icon class="mx-3 text-2xl" icon="basil:instagram-solid"></iconify-icon>
                </p>
                <p>+0 00 000</p>
                <p>mail@mail.com</p>
            </div>
        </div>
        <div class="pb-10 pl-5 mb-16 font-futuraBold text-greenG text-lg">
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
</aside>