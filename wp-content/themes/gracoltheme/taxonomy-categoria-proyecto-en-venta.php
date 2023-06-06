<?php get_header() ?>
<main class="w-full lg:mt-24">
    <section class="w-full">
        <figure class="">
            <picture>
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'baner_proyectos_mobile.png' ?>">
                <img src="<?= IMAGE . 'baner_proyectos.png' ?>" alt="">
            </picture>
        </figure>
    </section>

    <!-- Buscador -->
    <?= get_template_part('./components/_search') ?>
    <section id="loop_en_venta" class="max-w-screen-2xl mx-auto px-5 mb-5">
        <div class="sm:w-full grid grid-cols-1 md:grid-cols-3 gap-x-5 gap-y-8 md:w-4/5 md:mx-auto ">
            <?php while (have_posts()) {
                the_post();
                // the_content();
                get_template_part('components/cards/_card', 'enVenta');
                
            }
            ?>
        </div>
    </section>
    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>
    <?= get_template_part('./components/sections/_home', 'experienciaG') ?>
    <?= get_template_part('./components/sections/_faq') ?>
</main>



<?php get_footer() ?>