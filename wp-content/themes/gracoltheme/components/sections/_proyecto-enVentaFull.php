<?php
$avanceID = get_post_meta(get_the_ID(), 'p_avance_id', true);
while (have_posts()) :
    the_post();
    $banerMobile = get_post_meta($post->ID, 'project_baner_mobile', true);
?> <figure class="w-full overflow-hidden">
        <picture class="w-screen overflow-hidden">
            <source media="(max-width: 600px)" data-srcset="<?= $banerMobile ?>">
            <img class="w-full lazyload" src="low-quality.jpg" data-src="<?= the_post_thumbnail_url('original') ?>" alt="">
        </picture>
    </figure>
    <?= get_template_part('components/sections/_proyecto', 'mainInfo') ?>
    <?= get_template_part('components/sections/_proyecto', 'galeries') ?>
    <?= get_template_part('components/sections/_proyecto', 'form') ?>
    <?= get_template_part('components/sections/_proyecto', 'ubicacion') ?>
    <?= get_template_part('components/sections/_proyecto', 'asesores') ?>

    <?php if (isset($avanceID) && $avanceID !== '') : ?>
        <section id="bannersGEn" class="relative mx-auto mt-10 max-w-screen-2xl">
            <a class="" href="<?= get_permalink($avanceID) ?>">
                <picture>
                    <img class="lazyload" data-src="<?= IMAGE . '/BANNER_avance_obra.jpg' ?>" alt="">
                </picture>
                <h4 class="absolute w-full text-3xl font-bold text-center text-white underline bottom-[23%]">Ir al avance de obra</h4>
            </a>
        </section>
    <?php endif; ?>
    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>
    <?= get_template_part('./components/sections/_loop', 'faq') ?>


<?php
endwhile; ?>
<div class="fixed bottom-0 z-40 hidden w-full py-2 text-center text-white bg-orangeG lg:block">¿Quieres mas información del proyecto? <a href="#gs_FormProject" class="text-lg underline font-futuraBold">Regístrate para más información</a></div>
<div class="fixed z-50 px-5 py-1 mb-3 ml-5 text-center text-white rounded bg-orangeG lg:hidden bottom-16">
    <a href="#gs_FormProject" class="text-lg underline font-futuraBold">Más información</a>
</div>