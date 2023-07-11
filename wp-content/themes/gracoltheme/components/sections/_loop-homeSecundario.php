<?php
$args = array(
    'post_type'       => 'proyectos',
    'posts_per_page'  => -1,
    'order'           => 'ASC',
    'orderby'         => 'title'
);
$proyectos = new WP_Query($args);
?>

<?= get_template_part('components/_search', 'mini') ?>
<section class="mx-auto mb-5 max-w-screen-2xl">

    <div id="_loopHomeS" class="flex flex-row overflow-x-scroll">
        <?php
        if ($proyectos->have_posts()) :
        ?>
            <?php while ($proyectos->have_posts()) :
                $proyectos->the_post();
            ?>
                <?= get_template_part('components/cards/_card', 'homeMini') ?>

        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>


</section>