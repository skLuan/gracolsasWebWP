<?php get_header() ?>
<main class="lg:mt-24">
    <?php while (have_posts()) :
        the_post();
        $banerMobile = get_post_meta($post->ID, 'project_baner_mobile', true);
    ?> <figure class="w-full overflow-hidden">
            <picture class="w-screen overflow-hidden">
                <source media="(max-width: 600px)" srcset="<?= $banerMobile ?>">
                <img class="w-full" src="<?= the_post_thumbnail_url('original') ?>" alt="">
            </picture>
        </figure>
        <?= get_template_part('components/sections/_proyecto', 'mainInfo') ?>
        <?= get_template_part('components/sections/_proyecto', 'galeries') ?>
        <?= get_template_part('components/sections/_proyecto', 'form') ?>
        <?= get_template_part('components/sections/_proyecto', 'ubicacion') ?>
        <?= get_template_part('components/sections/_proyecto', 'asesores') ?>

        <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>
        <?= get_template_part('./components/sections/_loop', 'faq') ?>


    <?php
    endwhile; ?>
    <div class="bg-orangeG hidden lg:block py-2 text-center text-white fixed bottom-0 w-full z-40">Escríbenos para más información <a href="#gs_FormProject" class="underline font-futuraBold text-lg">Ir al formulario</a></div>
    <div class="bg-orangeG lg:hidden py-1 px-5 text-center text-white fixed ml-5 mb-3 rounded bottom-16 z-50">
        <a href="#gs_FormProject" class="underline font-futuraBold text-lg">Ir al formulario</a></div>
</main>
<?php get_footer() ?>