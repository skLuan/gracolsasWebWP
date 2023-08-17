<?php
$cardData = new CardProject(get_the_ID());

// if(in_array(8, $tagsIdArray) || in_array(27, $cardData->dinamicTags)){
//     $heightOfPicture = 'h-[360px]';
// } else $heightOfPicture = 'h-80';

?>
<div class="flex flex-col w-full overflow-hidden bg-white rounded-sm shadow-lg max-w-1/3 ">
    <?= get_template_part('components/cards/_partCard', 'image', ['cardData' => $cardData]) ?>
    <article class="p-5 text-greenG-mid">
        <h3 class="text-2xl font-futuraBold text-greenG"><a href="<?= $cardData->getPLink() ?>"><?= the_title() ?></a></h3>
        <p class="text-lg text-orangeG font-futuraBold"><?= $cardData->getUbicacion()[0] ?>
            <span class="text-grayG !font-futura"><?= $cardData->getUbicacion()[1] ?></span>
        </p>
        <div class="flex flex-row items-end mt-2 mb-4">
            <iconify-icon class="mr-3 text-3xl text-greenG" icon="<?= $cardData->getTypeIcon() ?>"></iconify-icon>
            <span class="text-end"><?= $cardData->getInmueble() ?></span>
        </div>
        <div class="flex flex-row justify-between text-lg">
            <div class="flex flex-row items-center">
                <iconify-icon class="mr-3 text-3xl text-greenG" icon="material-symbols:bed"></iconify-icon>
                <p class="text-greenG-mid"><b class=""><?= $cardData->getAlcobas() ?></b><span class=""> Alcobas</span></p>
            </div>
            <div class="flex flex-row items-center">
                <iconify-icon class="mr-3 text-3xl text-greenG" icon="tabler:ruler-measure"></iconify-icon>
                <p class="text-lg text-greenG-mid"><b class=""><?= $cardData->getMt2() ?></b> Mt2</p>
            </div>
        </div>
        <div class="h-[1px] bg-greenG w-11/12 mx-auto my-3"></div>
        <div class="text-base leading-tight">
            <?= $cardData->getDescrition() ?>
        </div>
        <?= get_template_part('components/cards/_partCard', 'precios', ['cardData' => $cardData]); ?>
    </article>
    <a class="flex items-center justify-center w-full pt-2 pb-3 mt-auto text-lg underline bg-greenG text-whiteG font-futuraBold" href="<?= $cardData->getPLink() ?>">Ver proyecto</a>
</div>