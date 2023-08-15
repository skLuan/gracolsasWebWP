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
    <div class="w-64 shrink-0 md:w-full">
        <figure class="<?= $isOriginal ? '' : 'py-3' ?>">
            <picture class="w-full">
                <img class="lazyload <?= $isOriginal ? 'w-full' : 'h-1/2' ?>" data-src="<?= $urlImage ?>" alt="">
            </picture>
        </figure>
        <article class="p-3 text-greenG-mid">
            <h3 class="text-2xl font-futuraBold text-orangeG"><a href="<?= $permalink ?>">
                    <?= $title ?>
                </a></h3>
            <p>
                <?= $content ?>
            </p>
            <div class="w-full text-right">
                <p class="text-lg text-orangeG font-futuraBold">Ver más</p>
            </div>
        </article>
    </div>
</div>