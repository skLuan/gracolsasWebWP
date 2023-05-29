<?php
$precio = get_post_meta(get_the_ID(), 'gs_precio_col', true);
$precioSMLV = get_post_meta(get_the_ID(), 'gs_precio_SMLV', true);
$tags = get_the_terms(get_the_ID(), 'tag-proyecto');

$tags && isset($tags) ? $inmueble = $tags[0]->name : $inmueble = '';

$image_url = get_the_post_thumbnail_url(get_the_ID(), 'original');

$permalink = get_the_permalink(get_the_ID());
?>
<div class="rounded-sm bg-white shadow-lg overflow-hidden">
    <picture class="relative">
        <img class="-translate-x-1/2 h-72 max-w-none" src="<?= $image_url ?>" alt="">
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