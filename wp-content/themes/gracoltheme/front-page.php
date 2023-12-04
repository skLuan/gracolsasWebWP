<?php get_header() ?>
<main class="w-full mt-16 lg:mt-20">
    <?php while (have_posts()) {
        the_post();
        the_content();
    }
    wp_reset_query();
    ?>
    <!-- Esto tiene que ir dentro del contenido como bloque -->

    <!-- Buscador -->
    
    
    <?= get_template_part('./components/_search') ?>
    <section id="Loop-principal" class="px-5 mx-auto mb-5 max-w-screen-2xl">
        <?= get_template_part('./components/sections/_loop', 'home') ?>
    </section>

    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>
    <?= get_template_part('./components/sections/_home', 'news') ?>
    <?= get_template_part('./components/sections/_home', 'experienciaG') ?>
    <?= get_template_part('./components/sections/_loop', 'faq') ?>
    <?= get_template_part('./components/sections/_loop', 'homeSecundario') ?>
</main>
<?php get_footer() ?>