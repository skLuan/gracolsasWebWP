<?php
$args = array(
    'post_type'       => 'proyectos',
    'posts_per_page'  => -1,
    'order'           => 'ASC',
    'orderby'         => 'title'
);
$proyectos = new WP_Query($args);
if ($proyectos->have_posts()) :
?>
    <div class="sm:w-full grid grid-cols-1 md:grid-cols-3 gap-x-5 gap-y-8 md:w-4/5 md:mx-auto ">

        <?php while ($proyectos->have_posts()) :
            $proyectos->the_post();
            $precio = get_post_meta(get_the_ID(), 'gs_precio_col', true);
            $precioSMLV = get_post_meta(get_the_ID(), 'gs_precio_SMLV', true);
            $tags = get_the_terms(get_the_ID(), 'tag-proyecto');

            $tags && isset($tags) ? $inmueble = $tags[0]->name : $inmueble = '';

            $permalink = get_the_permalink(get_the_ID());
        ?>
            <div class="rounded-sm bg-white shadow-lg">
                <picture class="h-72">
                    <?= the_post_thumbnail('large'); ?>
                </picture>
                <article class="p-3 text-greenG-mid">
                    <h3 class="font-futuraBold text-2xl text-greenG-mid"><a href="<?= $permalink ?>"><?= the_title() ?></a></h3>
                    <p class="text-orangeG text-lg font-futuraBold">Barrio <a class="text-grayG !font-futura" href="">Ciudad</a></p>
                    <div class="flex flex-row">
                        <picture>
                            <img src="" alt="">
                        </picture>
                        <span><?= $inmueble ?></span>
                    </div>
                    <div class="flex flex-row mt-5">
                        <div class="mr-10">
                            <span class="text-base text-greenG">Desde*:</span>
                            <?php if (!empty($precio)) : ?>
                                <h3 class="text-orangeG text-xl font-futuraBold"><?= $precioSMLV ?> SMMLV</h3>
                            <?php endif; ?>
                        </div>
                        <div>
                            <span class="text-base text-greenG">Valor aproximado:</span>
                            <?php if (!empty($precio)) : ?>
                                <h3 class="text-orangeG text-xl font-futuraBold">$<?= $precio ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                </article>
                <a class="w-full bg-greenG text-whiteG underline text-lg flex items-center justify-center pb-3 pt-2  font-futuraBold" href="<?= $permalink ?>">Ver proyecto</a>
            </div>

        <?php endwhile; ?>



    </div>
<?php endif; ?>