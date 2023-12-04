<?php
$title = get_the_title();
$permalink = get_permalink(get_the_ID());
$content = get_the_excerpt();

$content = substr($content, 0, 200) . '...';

$urlImage = $urlBase = IMAGE . 'img-post.png';
if (get_the_post_thumbnail_url() !== false && get_the_post_thumbnail_url() !== '') {
    $urlImage = get_the_post_thumbnail_url();
}

$isOriginal = $urlBase == $urlImage;
?>
<div class="bg-white rounded-sm shadow-lg snap-center shrink-0">
    <div class="w-64 shrink-0 md:w-full h-full flex flex-col">
        <figure class="min-h-[203px] ">
            <a href="<?= $permalink ?>">
                <picture class="w-full m-auto">
                    <img class="lazyload m-auto <?= $isOriginal ? 'w-full' : 'w-full' ?>" data-src="<?= $urlImage ?>" alt="">
                </picture>
            </a>
        </figure>
        <article class="p-3 text-greenG-mid">
            <h3 class="text-2xl font-futuraBold text-greenG"><a href="<?= $permalink ?>">
                    <?= $title ?>
                </a></h3>
            <p calss="leading-tight">
                <?= $content ?>
            </p>
        </article>
        <div class="p-3 w-full text-right mt-auto">
            <a href="<?= $permalink ?>" class="text-lg text-orangeG font-futuraBold">Ver más</a>
        </div>
    </div>
</div>