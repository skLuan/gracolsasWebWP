<?php get_header();

get_the_post_thumbnail_url(get_the_ID(), 'medium') ?
    $urlImage = get_the_post_thumbnail_url(get_the_ID(), 'medium') :
    $urlImage = IMAGE . 'img-post.png';

?>
<main class="w-full lg:mt-24">
    <?php while (have_posts()) :
        the_post();
    ?>
    <section class="sm:w-full grid grid-cols-1 md:w-4/5 md:mx-auto mt-5 mb-5 bg-white">
        <article class="border-color border-b-[4px]  grid grid-cols-1 md:grid-cols-2 gap-2">
            <div><img src="<?= $urlImage ?>" alt="image" class="image-blog" ></div>
            <div class="col-start-2 col-span-6 text-left flex flex-col justify-center items-left mb-5 mx-3 md:mx-5">
                <div class="md:mx-5">
                    <img src="<?= $urlImage ?>" alt="image" class="image-blog block md:hidden" >
                    <h2 class="text-greenG text-3xl md:text-4xl lg:text-5xl font-futuraBold"><?= the_title(); ?></h2>
                </div>
            </div>
        </article>
        <article class="columns-1 md:columns-2 lg:columns-3 p-4 mx-3 md:mx-5">
            <p class="md:px-5"><?= the_content(); ?></p>
        </article>
    </section>
    <?php endwhile; ?>
</main>

<?php get_footer() ?>