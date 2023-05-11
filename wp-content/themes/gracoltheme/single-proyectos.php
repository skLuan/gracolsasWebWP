<?php get_header() ?>
<main class="mt-24">
    <?php while (have_posts()) :
        the_post();
    ?>
        <picture class="w-screen">
            <img class="w-full" src="<?= the_post_thumbnail_url('original') ?>" alt="">
        </picture>
        <section class="max-w-screen-2xl mx-auto bg-white px-5 rounded-sm shadow-lg">
        <div>
            <h2 class="font-futuraBold text-5xl text-greenG-mid uppercase"><?= the_title() ?></h2>
        </div>    
        <article>
                <?= the_content(); ?>
            </article>
        </section>
    <?php
    endwhile; ?>
</main>
<?php get_footer() ?>