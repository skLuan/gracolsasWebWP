<?php get_header();

$args = array(
    'post_type' => 'proyectos',
    'orderby' => 'title',
    'order' => 'ASC',
    'tax_query'        => array(
        array(
            'taxonomy' => 'categoria-proyecto',
            'field' => 'slug',
            'terms' => 'obras-entregadas',
            'operator' => 'NOT IN'
        ),
    )
);
query_posts($args);
?>
<main class="w-full lg:mt-24">
    <section class="w-full">
        <figure class="mt-10 lg:mt-0">
            <picture>
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'baner_proyectos_mobile.png' ?>">
                <img class="lazyload" src="low-quality.jpg" data-src="<?= IMAGE . 'baner_proyectos.png' ?>" alt="">
            </picture>
        </figure>
    </section>

    <!-- Buscador -->
    <?= get_template_part('./components/_search') ?>
    <section class="px-5 mx-auto mb-5 max-w-screen-2xl">
        <div id="_loopVenta" class="grid grid-cols-1 sm:w-full md:grid-cols-3 gap-x-5 gap-y-8 md:w-4/5 md:mx-auto ">
            <?php while (have_posts()) {
                the_post();
                // the_content();
                get_template_part('components/cards/_card', 'enVenta');
            }
            wp_reset_query();
            ?>
        </div>
    </section>
    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>
    <?= get_template_part('./components/sections/_home', 'experienciaG') ?>
    <?= get_template_part('./components/sections/_loop', 'faq') ?>
</main>
<?php
get_footer() ?>