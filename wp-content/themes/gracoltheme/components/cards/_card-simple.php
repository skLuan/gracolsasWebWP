<?php
// dd(get_the_ID());+
$cardData = new CardProject(get_the_ID());

$tags = get_the_terms(get_the_ID(), 'tag-proyecto');
$tags && isset($tags) ? $inmueble = $tags[0]->name : $inmueble = '';
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'original');
// dd($cardData);
?>
<div class="rounded-sm overflow-hidden w-full flex flex-col max-w-1/3 mt-10">
    <div class="relative bg-white shadow-lg p-5 w-10/12 h-full mb-10 m-auto">
        <picture class="relative">
            <img class="m-auto w-10/12" src="<?= $cardData->getlogoUrl() ?>" alt="">
        </picture>
    </div>
    <a class="w-full bg-grayG text-whiteG rounded-sm underline text-lg flex items-center justify-center pb-3 pt-2  font-futuraBold" href="<?= $cardData->getPLink() ?>">Ver proyecto</a>
</div>