<?php
isset($args['idP'])?
$gsPostID = $args['idP']:
$gsPostID = get_the_ID();

$cardData = new CardProject($gsPostID);
?>
<div class="w-full bg-white rounded-sm shadow-lg">
    <?= get_template_part('components/cards/_partCard', 'image', ['cardData' => $cardData]) ?>
    <article class="p-5 text-greenG-mid">
        <h3 class="text-2xl font-futuraBold text-greenG"><a href="<?= $cardData->getPLink() ?>"><?= get_the_title($gsPostID) ?></a></h3>
        <p class="text-lg text-orangeG font-futuraBold"><?= $cardData->getUbicacion()[0] ?>
            <span class="text-grayG !font-futura"><?= $cardData->getUbicacion()[1] ?></span>
        </p>
        <div class="flex flex-row items-end mt-2 mb-4">
            <iconify-icon class="mr-3 text-3xl text-greenG" icon="<?= $cardData->getTypeIcon() ?>"></iconify-icon>
            <span class="text-end"><?= $cardData->getInmueble() ?></span>
        </div>
        <?= get_template_part('components/cards/_partCard', 'precios', ['cardData' => $cardData]); ?>
    </article>
    <a class="flex items-center justify-center w-full pt-2 pb-3 text-lg underline bg-greenG text-whiteG font-futuraBold" href="<?= $cardData->getPLink() ?>">Ver proyecto</a>
</div>