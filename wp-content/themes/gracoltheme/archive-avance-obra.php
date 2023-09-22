<?php
get_header();
$bannerAvance = IMAGE . 'baner_avanceObra.png';
$mobileBanner = IMAGE . 'baner_avanceObraMobile.png';

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
$avance = false;
if (is_archive('avance-obra')) {
    $avance = true;
}
query_posts($args);
?>
<main class="w-full mt-16">
    <section class="w-full">
        <figure class="mt-10 lg:mt-0">
            <picture>
                <source media="(max-width: 500px)" data-srcset="<?= $mobileBanner ?>">
                <img class="lazyload" src="low-quality.jpg" data-src="<?= $bannerAvance ?>" alt="principal banner">
            </picture>
        </figure>
    </section>
    <section id="loopP" class="px-5 mx-auto mb-5 max-w-screen-2xl">
        <div class="grid grid-cols-1 sm:w-full md:grid-cols-3 gap-x-5 gap-y-8 md:w-4/5 md:mx-auto ">
            <?php
            while (have_posts()) {
                the_post();
                //the_content();
                get_template_part('components/cards/_card', 'simple', ['avance' => $avance]);
            }
            wp_reset_query();
            ?>
        </div>
    </section>
</main>



<?php get_footer() ?>