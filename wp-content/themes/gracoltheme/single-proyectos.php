<?php get_header() ?>
<main class="mt-24">
    <?php while (have_posts()) :
        the_post();
    ?>
        <picture class="w-screen overflow-hidden h-[400px]">
            <img class="w-full" src="<?= the_post_thumbnail_url('original') ?>" alt="">
        </picture>
        <?= get_template_part('components/sections/_proyecto', 'mainInfo') ?>
        <?= get_template_part('components/sections/_proyecto', 'galeries') ?>
        <?= get_template_part('components/sections/_proyecto', 'form') ?>
        <?= get_template_part('components/sections/_proyecto', 'ubicacion') ?>
        <?= get_template_part('components/sections/_proyecto', 'asesores') ?>

        <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>
        <?= get_template_part('./components/sections/_faq') ?>


    <?php
    endwhile; ?>
    <div class="bg-orangeG py-2 text-center text-white fixed bottom-0 w-full z-50">Escríbenos para más información <a href="#gs_FormProject" class="underline font-futuraBold ml-2 text-lg">Ir al formulario</a></div>
</main>
<?php get_footer() ?>