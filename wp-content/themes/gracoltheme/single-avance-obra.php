<?php get_header();

$bannerAvance = IMAGE . 'baner_avanceObra.png';
$mobileBanner = IMAGE . 'baner_avanceObraMobile.png';
$projectID = get_post_meta(get_the_ID(), 'a_project_id', true);

$logoProjectUrl = get_post_meta($projectID, 'project_logo', true);
?>
<main class="w-full lg:mt-24">
    <section class="w-full">
        <figure class="">
            <picture>
                <source media="(max-width: 500px)" data-srcset="<?= $mobileBanner ?>">
                <img class="w-full lazyload" data-src="<?= $bannerAvance ?>" alt="banner">
            </picture>
        </figure>
    </section>
    <section class="flex my-10">
        <figure class="p-5 mx-auto bg-white rounded shadow w-72">
            <picture>
                <img class="w-full lazyload" data-src="<?= $logoProjectUrl ?>" alt="logo project">
            </picture>
        </figure>
    </section>
    <section id="avance-galeries" class="pb-5 mx-auto my-10 bg-white shadow-lg max-w-screen-2xl">
        <?= get_template_part('components/sections/galeries/_g', 'avance') ?>
    </section>
    <section id="bannersGEn" class="mx-auto mb-5 max-w-screen-2xl">
        <a href=" <?= get_permalink($projectID) ?>">
            <picture>
                <img class="lazyload" data-src="<?= IMAGE . '/BANNER_avance_obra.jpg' ?>" alt="">
            </picture>
        </a>
    </section>
</main>
<?php get_footer() ?>