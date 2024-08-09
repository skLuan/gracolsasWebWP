<?php get_header();

get_the_post_thumbnail_url(get_the_ID(), 'high') ?
    $urlImage = get_the_post_thumbnail_url(get_the_ID(), 'high') :
    $urlImage = IMAGE . 'img-post.png';

$type = 'post';
$categories = get_the_category();
if (!empty($categories)) {
    foreach ($categories as $category) {
        if ($category->slug === 'manual-de-usuario') {
            $type = 'manual';
        }
    }
}

?>
<main class="w-full lg:mt-16">
    <?php while (have_posts()) :
        the_post();
    ?>
        <section class="grid grid-cols-1 mt-5 mb-5 bg-white sm:w-full md:w-4/5 md:mx-auto">
            <article class="border-color border-b-[4px]  grid grid-cols-1 md:grid-cols-2 gap-2">
                <picture class="py-10"><img data-src="<?= $urlImage ?>" alt="image" class="lazyload image-blog"></picture>
                <div class="flex flex-col justify-center mb-5 text-left lg:col-span-6 lg:col-start-2 lg:mx-3 items-left md:mx-5">
                    <div class="md:mx-5">
                        <h2 class="mx-5 text-3xl lg:mx-0 text-greenG md:text-4xl lg:leading-snug lg:text-5xl font-futuraBold"><?= the_title(); ?></h2>
                    </div>
                </div>
            </article>
            <?php
            switch ($type):
                case 'manual': ?>
                    <article class="w-full">
                        <?= the_content(); ?>
                    </article>
                <?php break;

                default: ?>
                    <article class="p-4 mx-3 columns-1 md:columns-2 lg:py-10 md:mx-5">
                        <p class="md:px-5"><?= the_content(); ?></p>
                    </article>
            <?php break;
            endswitch;
            ?>
        </section>
    <?php endwhile; ?>
</main>

<?php get_footer() ?>