<?php
get_header();
$bannerAvance = IMAGE . 'baner_avanceObra.png';
$banerTerminadas = IMAGE . 'baner_Entregadas.png';
// is_category('en-contruccion');
if (is_tax('categoria-proyecto', 'en-construccion')) {
    $actualBanner = $bannerAvance;
    $mobileBanner = IMAGE . 'baner_avanceObraMobile.png';
} else {
    $actualBanner = $banerTerminadas;
    $mobileBanner = IMAGE . 'baner_EntregadasMObile.png';
}
?>
<main class="w-full lg:mt-24">
    <section class="w-full">
        <figure class="">
            <picture>
                <source media="(max-width: 500px)" data-srcset="<?= $mobileBanner ?>">
                <img class="lazyload" src="low-quality.jpg" data-src="<?= $actualBanner ?>" alt="principal banner">
            </picture>
        </figure>
    </section>
    <section id="loopP" class="px-5 mx-auto mb-5 max-w-screen-2xl">
        <div class="grid grid-cols-1 sm:w-full md:grid-cols-3 gap-x-5 gap-y-8 md:w-4/5 md:mx-auto ">
            <?php while (have_posts()) {
                the_post();
                //the_content();
                get_template_part('components/cards/_card', 'simple');
            }
            ?>
        </div>
    </section>
</main>



<?php get_footer() ?>