<?php
$args = array(
    'post_type'       => 'proyectos',
    'posts_per_page'  => -1,
    'order'           => 'ASC',
    'orderby'         => 'title'
);
$proyectos = new WP_Query($args);
if ($proyectos->have_posts()) :
?>
    <!-- <div class="grid mx-auto mb-2 text-center">
        <p>Viendo <strong>3</strong> de <strong><?= $proyectos->post_count ?></strong></p>
    </div> -->
    <div id="_loopHomeP" class="grid grid-cols-1 sm:w-full md:grid-cols-3 gap-x-5 gap-y-8 md:w-4/5 md:mx-auto ">

        <?php while ($proyectos->have_posts()) :
            $proyectos->the_post();
        ?>
            <?= get_template_part('components/cards/_card', 'homeProyecto') ?>

        <?php endwhile;
        wp_reset_postdata();?>
    </div>
<?php endif; ?>