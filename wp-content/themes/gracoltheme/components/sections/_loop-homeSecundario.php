<?php
$args = array(
    'post_type'       => 'proyectos',
    'posts_per_page'  => -1,
    'order'           => 'ASC',
    'orderby'         => 'title',
    'tax_query'        => array(
        array(
            'taxonomy' => 'categoria-proyecto',
            'field' => 'slug',
            'terms' => 'obras-entregadas',
            'operator' => 'NOT IN'
        ),
    )
);
$proyectos = new WP_Query($args);
?>

<?= get_template_part('components/_search', 'mini') ?>
<section class="px-5 mx-auto mb-5 max-w-screen-2xl">
    <div id="_loopHomeS" class="swiperCard swiper">
        <div class="swiper-wrapper">
            <?php
            if ($proyectos->have_posts()) : ?>
                <?php while ($proyectos->have_posts()) :
                    $proyectos->the_post();
                ?>
                    <div class="swiper-slide">
                        <?= get_template_part('components/cards/_card', 'homeMini') ?>
                    </div>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>
    </div>


</section>