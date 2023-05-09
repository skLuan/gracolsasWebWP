<?php get_header() ?>
<h2 class="">Front page</h2>
    <?php while (have_posts()) {
        the_post();
        the_content();
    }
    ?>

<?php get_footer() ?>