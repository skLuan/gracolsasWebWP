<?php

// var_dump($args['idP']);

if (isset($args['idP'])) {
    $projectID = $args['idP'];
} else {
    $projectID = get_the_ID();
}
if (isset($args['avance'])) {
    $isAvance = $args['avance'];
} else {
    $isAvance = false;
}

// var_dump(get_the_title());

$cardData = new Card($projectID);

$tags = get_the_terms($projectID, 'tag-proyecto');
$tags && isset($tags) ? $inmueble = $tags[0]->name : $inmueble = '';
$image_url = get_the_post_thumbnail_url($projectID, 'original');

$avance_id = get_post_meta(get_the_ID(), 'p_avance_id', true);
$avanceUrl = get_the_permalink($avance_id);
$url = get_the_permalink(get_the_ID());

if($isAvance){
    $url = $avanceUrl;
}
?>
<div class="flex flex-col w-full mt-10 overflow-hidden rounded-sm">
    <div class="relative w-10/12 h-full p-5 m-auto mb-10 bg-white shadow-lg">
        <a href="<?= $url ?>">
            <picture class="relative">
                <img class="w-10/12 m-auto lazyload" src="low-quality.jpg" data-src="<?= $cardData->getlogoUrl() ?>" alt="">
            </picture>
        </a>
    </div>
    <a class="flex items-center justify-center w-full pt-2 pb-3 text-lg underline rounded-sm bg-grayG text-whiteG font-futuraBold" href="<?= $url ?>">Ver proyecto</a>
</div>