<?php get_header() ?>
<main class="mt-24">
    <?php while (have_posts()) :
        the_post();

        $precio = get_post_meta(get_the_ID(), 'gs_precio_col', true);
        $precioSMLV = get_post_meta(get_the_ID(), 'gs_precio_SMLV', true);
        $tags = get_the_terms(get_the_ID(), 'tag-proyecto');
    ?>
        <picture class="w-screen">
            <img class="w-full" src="<?= the_post_thumbnail_url('original') ?>" alt="">
        </picture>
        <section class="max-w-screen-2xl mx-auto bg-white px-5 rounded-sm shadow-lg relative grid gap-5 grid-cols-12 pb-5">
            <picture class="absolute -top-5"><img src="" alt=""></picture>
            <div class="pt-20 col-span-10 col-start-2">
                <h2 class="font-futuraBold text-5xl text-greenG-mid uppercase"><?= the_title() ?></h2>
                <h3 class="text-orangeG text-4xl font-futuraBold">Barrio <a class="text-grayG !font-futura ml-10" href="">Ciudad</a></h3>
            </div>
            <article class="col-start-2 col-span-5">
                <?= the_content(); ?>
            </article>
            <article class="col-span-5">
                <p class="text-center mx-auto">Cambio de moneda</p>
                <div class="flex flex-row">
                    <button class="ml-auto">COL</button>
                    <button class="mx-5">USD</button>
                    <button class="mr-auto">EUR</button>
                </div>
                <div class="flex flex-row mt-5 mx-auto">
                    <div class="mr-10 ml-auto">
                        <span class="text-base text-greenG">Desde*:</span>
                        <?php if (!empty($precio)) : ?>
                            <h3 class="text-orangeG text-xl font-futuraBold"><?= $precioSMLV ?> SMMLV</h3>
                        <?php endif; ?>
                    </div>
                    <div class="mr-auto">
                        <span class="text-base text-greenG">Valor aproximado:</span>
                        <?php if (!empty($precio)) : ?>
                            <h3 class="text-orangeG text-xl font-futuraBold">$<?= $precio ?></h3>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
        </section>
    <?php
    endwhile; ?>
</main>
<?php get_footer() ?>