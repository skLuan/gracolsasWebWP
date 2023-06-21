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
    <section class="flex">
        <figure class="p-5 mx-auto bg-white rounded shadow w-72">
            <picture>
                <img class="w-full lazyload" data-src="<?= $logoProjectUrl ?>" alt="logo project">
            </picture>
        </figure>
    </section>
    <section id="avance-galeries">
        
    </section>
    <?php while (have_posts()) :
        the_post();
    ?>
        <div class="flex flex-col mx-auto lg:w-2/3">
            <article>
                <h2 class="text-2xl text-greenG font-futuraBold">
                    <?= the_title(); ?>
                </h2>
                <?= the_content(); ?>
            </article>
        </div>

    <?php endwhile; ?>
</main>
<?php get_footer() ?>