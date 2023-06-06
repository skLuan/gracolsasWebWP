<?php
// dd(get_the_ID());+
$cardData = new CardProject(get_the_ID());

$tags = get_the_terms(get_the_ID(), 'tag-proyecto');
$tags && isset($tags) ? $inmueble = $tags[0]->name : $inmueble = '';
$image_url = get_the_post_thumbnail_url(get_the_ID(), 'original');
// dd($cardData);
?>
<div class="rounded-sm bg-white shadow-lg overflow-hidden w-full max-w-1/3 ">
    <div class="relative">
        <figure class="bg-white p-5 left-5 bottom-5 shadow-lg rounded absolute z-30 h-[110px] w-[110px]">
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