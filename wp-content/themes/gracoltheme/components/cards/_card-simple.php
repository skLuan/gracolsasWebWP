<?php

if (is_tax('categoria-proyecto', 'en-construccion')) {
    $projectID = get_the_ID();
} else {    
    $projectID = get_post_meta(get_the_ID(), 'a_project_id', true);
    isset($projectID) && $projectID != '' ? $projectID = intval($projectID) : '';
}


$cardData = new CardProject($projectID);

$tags = get_the_terms($projectID, 'tag-proyecto');
$tags && isset($tags) ? $inmueble = $tags[0]->name : $inmueble = '';
$image_url = get_the_post_thumbnail_url($projectID, 'original');
$url = get_permalink(get_the_ID());
?>
<div class="flex flex-col w-full mt-10 overflow-hidden rounded-sm max-w-1/3">
    <div class="relative w-10/12 h-full p-5 m-auto mb-10 bg-white shadow-lg">
        <a href="<?= $url ?>">
            <picture class="relative">
                <img class="w-10/12 m-auto lazyload" src="low-quality.jpg" data-src="<?= $cardData->getlogoUrl() ?>" alt="">
            </picture>
        </a>
    </div>
    <a class="flex items-center justify-center w-full pt-2 pb-3 text-lg underline rounded-sm bg-grayG text-whiteG font-futuraBold" href="<?= $url ?>">Ver proyecto</a>
</div>