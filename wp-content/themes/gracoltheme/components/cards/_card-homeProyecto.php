<?php
$cardData = new CardProject(get_the_ID());
?>
<div class="rounded-sm bg-white shadow-lg w-full">
    <?= get_template_part('components/cards/_partCard', 'image', ['cardData' => $cardData]) ?>
    <article class="p-5 text-greenG-mid">
        <h3 class="font-futuraBold text-2xl text-greenG-mid"><a href="<?= $cardData->getPLink() ?>"><?= the_title() ?></a></h3>
        <p class="text-orangeG text-lg font-futuraBold"><?= $cardData->getUbicacion()[0] ?>
            <span class="text-grayG !font-futura"><?= $cardData->getUbicacion()[1] ?></span>
        </p>
        <div class="flex flex-row mt-2 mb-4 items-end">
            <iconify-icon class="text-3xl text-greenG mr-3" icon="<?= $cardData->getTypeIcon() ?>"></iconify-icon>
            <span class="text-end"><?= $cardData->getInmueble() ?></span>
        </div>
        <div class="flex flex-row mt-5">
            <div class="mr-10">
                <span class="text-base text-greenG">Desde*:</span>
                <?php if (!empty($cardData->getvalorSMLV())) : ?>
                    <h3 class="text-orangeG text-xl font-futuraBold"><?= $cardData->getvalorSMLV() ?> SMMLV</h3>
                <?php endif; ?>
            </div>
            <div>
                <span class="text-base text-greenG">Valor aproximado:</span>
                <?php if (!empty($cardData->getvalorPesos())) : ?>
                    <h3 class="text-orangeG text-xl font-futuraBold">$<?= $cardData->getValorPesos() ?></h3>
                <?php endif; ?>
            </div>
        </div>
    </article>
    <a class="w-full bg-greenG text-whiteG underline text-lg flex items-center justify-center pb-3 pt-2  font-futuraBold" href="<?= $cardData->getPLink() ?>">Ver proyecto</a>
</div>