<?php get_header() ?>
<main class="mt-24">
    <?php while (have_posts()) {
        the_post();
        the_content();
    }
    ?>
    </main>
<?php get_footer() ?>