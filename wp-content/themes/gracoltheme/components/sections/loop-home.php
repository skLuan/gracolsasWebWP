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
    <div class="grid grid-cols-3 gap-x-5 gap-y-8 w-4/5 mx-auto">

        <?php while ($proyectos->have_posts()) :
            $proyectos->the_post()
        ?>
            <div class="rounded-sm bg-white shadow-lg">
                <picture>
                    <?= the_post_thumbnail('thumbnail'); ?>
                </picture>
                <article class="p-3 text-greenG-mid">
                    <h3 class="font-futuraBold text-2xl text-greenG-mid"><?= the_title() ?></h3>
                    <p class="text-orangeG text-lg font-futuraBold">Barrio <a class="text-grayG !font-futura" href="">Ciudad</a></p>
                    <div class="flex flex-row">
                        <picture>
                            <img src="" alt="">
                        </picture>
                        <span>Apartamentos</span>
                    </div>
                </article>
                <a class="w-full bg-greenG text-whiteG underline text-lg flex items-center justify-center pb-3 pt-2  font-futuraBold" href="">Ver proyecto</a>
            </div>

        <?php endwhile; ?>



    </div>
<?php endif; ?>