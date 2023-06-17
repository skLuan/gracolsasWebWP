<?php
$cardData = new CardProject(get_the_ID());

$tags = get_the_terms(get_the_ID(), 'tag-proyecto');
$tags && isset($tags) ? $inmueble = $tags[0]->name : $inmueble = '';
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'original');
?>
<div class="flex flex-col w-full mt-10 overflow-hidden rounded-sm max-w-1/3">
    <div class="relative w-10/12 h-full p-5 m-auto mb-10 bg-white shadow-lg">
        <picture class="relative">
            <img class="w-10/12 m-auto lazyload" src="low-quality.jpg" data-src="<?= $cardData->getlogoUrl() ?>" alt="">
        </picture>
    </div>
    <a class="flex items-center justify-center w-full pt-2 pb-3 text-lg underline rounded-sm bg-grayG text-whiteG font-futuraBold" href="<?= $cardData->getPLink() ?>">Ver proyecto</a>
</div>