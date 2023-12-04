<?php
$cardData = new CardProject(get_the_ID());
?>
<div class="bg-white rounded-sm shadow-lg w-full max-w-[23rem]">
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
    </article>
    <a class="flex items-center justify-center w-full pt-2 pb-3 text-lg underline bg-greenG text-whiteG font-futuraBold" href="<?= $cardData->getPLink() ?>">Ver proyecto</a>
</div>