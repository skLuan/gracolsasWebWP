<aside id="sidepanel" class="mobile-nav__wrapper">
    <div id="overlay" class="mobile-nav__overlay mobile-nav__toggler"></div>
    <div class="content-between bg-white border-l-2 mobile-nav__content border-greenG">
        <div>
            <a href="<?= home_url() ?>" class=""><img class="w-full" src="<?= IMAGE . 'logoNavBar.svg' ?>" alt="Gracol logo"></a>
            <div class="w-full h-auto pl-5 mt-3 text-greenG">
                <a href="<?= FACEBOOK_URL ?>">
                    <iconify-icon class="text-2xl" icon="ic:baseline-facebook"></iconify-icon>
                </a>
                <a href="<?= INSTAGRAM_URL ?>">
                    <iconify-icon class="mx-3 text-2xl" icon="basil:instagram-solid"></iconify-icon>
                </a>
                <p>
                    <a href="<?= NUM_SERVICIOCLIENTE ?>"> <?= NUM_SERVICIOCLIENTE_PRINT ?></a>
                    <a href="mailto:<?= EMAIL_SERVICIOCLIENTE ?>"><?= EMAIL_SERVICIOCLIENTE ?></a>
                </p>
            </div>
        </div>
        <div class="pb-10 pl-5 mt-20 text-lg mb-36 font-futuraBold text-greenG">
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