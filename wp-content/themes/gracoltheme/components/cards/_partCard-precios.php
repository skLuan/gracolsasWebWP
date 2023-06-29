<?php
$cardData = $args['cardData'];
?>
<div class="flex flex-row mt-5">
    <div class="mr-10">
        <?php if (!empty($cardData->getvalorSMLV())) : ?>
            <span class="text-base text-greenG">Desde*:</span>
            <h3 class="text-xl text-orangeG font-futuraBold"><?= $cardData->getvalorSMLV() ?> SMMLV</h3>
        <?php endif; ?>
    </div>
    <div>
        <?php if (!empty($cardData->getvalorPesos())) : ?>
            <span class="text-base text-greenG">Valor aproximado:</span>
            <h3 class="text-xl text-orangeG font-futuraBold">$<?= $cardData->getValorPesos() ?></h3>
        <?php endif; ?>
    </div>
</div>
<p class="mt-2 text-sm leading-none text-greenG">
    El precio final de la propiedad será determinado por el incremento en el SMMLV que sea establecido por el gobierno nacional en el año en el que se realice la escritura de compraventa.
</p>