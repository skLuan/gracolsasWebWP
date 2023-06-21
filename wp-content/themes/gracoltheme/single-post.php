<?php get_header();

get_the_post_thumbnail_url(get_the_ID(), 'medium') ?
    $urlImage = get_the_post_thumbnail_url(get_the_ID(), 'medium') :
    $urlImage = IMAGE . 'img-post.png';

?>
<main class="mt-32 mb-10">
    <?php while (have_posts()) :
        the_post();
    ?>
        <div class="flex flex-col mx-auto lg:w-2/3">
            <figure class="">
                <picture>
                    <img class="w-full " data-src="<?= $urlImage ?>" alt="banner">
                </picture>
            </figure>
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