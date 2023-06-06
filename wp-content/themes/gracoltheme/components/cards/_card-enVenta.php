<?php
// dd(get_the_ID());+
$cardData = new CardProject(get_the_ID());

$tags = get_the_terms(get_the_ID(), 'tag-proyecto');
$tags && isset($tags) ? $inmueble = $tags[0]->name : $inmueble = '';
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'original');
// dd($cardData);
?>
<div class="rounded-sm bg-white shadow-lg overflow-hidden flex flex-col w-full max-w-1/3 ">
    <div class="relative">
        <figure class="bg-white p-5 left-5 bottom-5 shadow-lg rounded absolute z-40 h-[110px] w-[110px]">
            <picture><img class="" src="<?= $cardData->getlogoUrl() ?>" alt=""></picture>
        </figure>
        <picture class="relative">
            <img class="-translate-x-1/2 h-80 max-w-none" src="<?= $image_url ?>" alt="">
        </picture>
    </div>
    <article class="p-5 text-greenG-mid">
        <h3 class="font-futuraBold text-2xl text-greenG-mid"><a href="<?= $cardData->getPLink() ?>"><?= the_title() ?></a></h3>
        <p class="text-orangeG text-lg font-futuraBold"><?= $cardData->getUbicacion()[0] ?>
            <span class="text-grayG !font-futura"><?= $cardData->getUbicacion()[1] ?></span>
        </p>
        <div class="flex flex-row">
            <picture>
                <img src="" alt="">
            </picture>
            <span><?= $inmueble ?></span>
        </div>
        <div class="flex flex-row justify-between text-lg">
            <div class="flex flex-row items-center">
                <iconify-icon class="text-greenG mr-3 text-3xl" icon="material-symbols:bed"></iconify-icon>
                <p class="text-greenG-mid"><b class=""><?= $cardData->getAlcobas() ?></b><span class=""> Alcobas</span></p>
            </div>
            <div class="flex flex-row items-center">
                <iconify-icon class="text-greenG mr-3 text-3xl" icon="tabler:ruler-measure"></iconify-icon>
                <p class="text-greenG-mid text-lg"><b class=""><?= $cardData->getMt2() ?></b> Mt2</p>
            </div>
        </div>
        <div class="h-[1px] bg-greenG w-11/12 mx-auto my-3"></div>
        <div class="text-base">
            <?= $cardData->getDescrition() ?>
        </div>
        <div class="flex flex-row mt-5">
            <div class="mr-10">
                <?php if (!empty($cardData->getvalorSMLV())) : ?>
                    <span class="text-base text-greenG">Desde*:</span>
                    <h3 class="text-orangeG text-xl font-futuraBold"><?= $cardData->getvalorSMLV() ?> SMMLV</h3>
                <?php endif; ?>
            </div>
            <div>
                <?php if (!empty($cardData->getvalorPesos())) : ?>
                    <span class="text-base text-greenG">Valor aproximado:</span>
                    <h3 class="text-orangeG text-xl font-futuraBold">$<?= $cardData->getValorPesos() ?></h3>
                    <a href="https://www.mintrabajo.gov.co/prensa/comunicados/2022/diciembre/-1.160.000-ser%C3%A1-el-salario-minimo-para-2023-y-auxilio-de-transporte-por-140.606" target="_blank" class="text-[15px] text-center -mt-1 text-greenG underline">¿Cuánto vale un SMLV?</a>
                <?php endif; ?>
            </div>
        </div>
    </article>
    <a class="w-full mt-auto bg-greenG text-whiteG underline text-lg flex items-center justify-center pb-3 pt-2  font-futuraBold" href="<?= $cardData->getPLink() ?>">Ver proyecto</a>
</div>