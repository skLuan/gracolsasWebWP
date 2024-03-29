<?php
$cardData = $args['cardData'];
$tagsIdArray = array_map(function ($e) {
    return $e['id'];
}, $cardData->categories);

$tagsNameArray = array_map(function ($e) {
    return $e['name'];
}, $cardData->categories);

$heightOfPicture = 'h-[355px]';
?>
<div class="relative <?= $heightOfPicture ?> overflow-hidden w-full">
    <a href="<?= $cardData->getPLink() ?>">
        <?php if (in_array(14, $cardData->dinamicTags)) : // ID 
        ?>
            <svg class="absolute top-0 left-0 z-10" xmlns="http://www.w3.org/2000/svg" width="90" height="90" viewBox="0 0 90 90">
                <polygon points="0,0 90,0 0,90" fill="#F44D4D" />
                <text class="uppercase font-futuraBold" x="12" y="65" font-size="1rem" fill="#ffffff" transform="rotate(-45, 0, 0)" style="transform-box: fill-box; padding-bottom: 1px;">Nuevo</text>
            </svg>
        <?php endif; ?>

        <div class="absolute bottom-0 left-0 z-20 w-full">
            <figure class="bg-white p-5 ml-5 mb-5 shadow-lg rounded  h-[110px] w-[110px]">
                <picture><img class="lazyload" src="low-quality.jpg" data-src="<?= $cardData->getlogoUrl() ?>" alt=""></picture>
            </figure>
            <div class="grid w-full grid-cols-2 text-greenG-mid">
                <?php if (in_array(8, $tagsIdArray)) :
                    $tagIndex = array_search(8, $tagsIdArray);
                ?>
                    <div class="leading-tight flex flex-row items-center py-2 pl-5 bg-[#FFC805]">
                        <iconify-icon class="mr-2 text-xl lg:text-3xl" icon="healthicons:machinery-outline"></iconify-icon>
                        <?= $tagsNameArray[$tagIndex] ?>
                    </div>
                <?php endif;
                if (in_array(54, $cardData->dinamicTags)) :
                ?>
                    <div class="leading-tight flex flex-row items-center py-2 pr-1 pl-3   bg-[#FF902B]">
                        <iconify-icon class="mr-2 text-xl lg:text-3xl" icon="fluent:megaphone-loud-32-regular"></iconify-icon>
                        <?= $cardData->getNameofTag(54) ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <picture class="relative">
            <?php if ($cardData->getBannerMobile() != '') : ?>
                <img class="lazyload h-80 max-w-none" src="low-quality.jpg" data-src="<?= $cardData->getBannerMobile() ?>" alt="">
            <?php elseif ($cardData->getImage()) :  ?>
                <img class="h-full -translate-x-1/2 lazyload max-w-none" src="low-quality.jpg" data-src="<?= $cardData->getImage() ?>" alt="">
            <?php else : ?>
                <div class="w-[23rem]"></div>
            <?php endif; ?>
        </picture>
    </a>
</div>
