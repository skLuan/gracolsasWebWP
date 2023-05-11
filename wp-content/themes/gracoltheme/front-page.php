<?php get_header() ?>
<main class="mt-24">
    <?php while (have_posts()) {
        the_post();
        the_content();
    }
    ?>
    <!-- Esto tiene que ir dentro del contenido como bloque -->
    <section id="Loop-principal" class="max-w-screen-2xl mx-auto px-5">
        <?= get_template_part('./components/sections/loop', 'home') ?>
    </section>
    </main>
<?php get_footer() ?>