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
        <figure class="min-h-[203px] h-full flex px-5">
            <a href="<?= $permalink ?>" class="m-auto">
                <picture class="w-full m-auto">
                    <img class="lazyload m-auto <?= $isOriginal ? 'w-full' : 'w-full' ?>" data-src="<?= $urlImage ?>" alt="">
                </picture>
            </a>
        </figure>
        <div class=" w-full text-center mt-auto">
            <a href="<?= $permalink ?>" class="flex items-center justify-center w-full pt-2 pb-3 text-lg underline rounded-sm bg-grayG text-whiteG font-futuraBold">Ver manual</a>
        </div>
    </div>
</div>