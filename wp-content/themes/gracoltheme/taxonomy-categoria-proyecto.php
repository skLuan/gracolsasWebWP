<?php get_header() ?>

<section id="loop_en_venta" class="max-w-screen-2xl mx-auto px-5 mb-5 sm:w-full grid grid-cols-1 md:grid-cols-3 gap-x-5 gap-y-8 md:w-4/5 md:mx-auto">
    <?php while (have_posts()) {
        the_post();
        // the_content();
        echo get_template_part('components/cards/_card', 'enVenta');
    }
    ?>
</section>



<?php get_footer() ?>