<?php get_header() ?>
<main class="w-full mt-24">
    <?php while (have_posts()) {
        the_post();
        the_content();
    }
    ?>
    <!-- Esto tiene que ir dentro del contenido como bloque -->

    <!-- Buscador -->
    
    
    <?= get_template_part('./components/_search') ?>
    <section id="Loop-principal" class="max-w-screen-2xl mx-auto px-5 mb-5">
        <?= get_template_part('./components/sections/_loop', 'home') ?>
    </section>

    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>
    <?= get_template_part('./components/sections/_home', 'news') ?>
    <?= get_template_part('./components/sections/_home', 'experienciaG') ?>
    <?= get_template_part('./components/sections/_faq') ?>
    <?= get_template_part('./components/sections/_loop', 'homeSecundario') ?>

</main>
<?php get_footer() ?>