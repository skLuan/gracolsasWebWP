<?php
$asesor = $args['asesor'];
?>
<div class="flex flex-col justify-center mx-auto my-10 card-asesor lg:my-3 w-fit">
    <figure class="w-40 h-40 mx-auto overflow-hidden rounded-full">
        <picture class="">
            <img class="h-full lazyload max-w-none" width="" src="low-quality.jpg" data-src="<?= IMAGE . '/asesores/dummy_A.png' ?>" alt="">
        </picture>
    </figure>
    <div class="pt-3 text-center text-white">
        <h5 class="text-2xl font-futuraBold"><?= $asesor['name'] ?></h5>
        <p class="flex items-center justify-center">
            <iconify-icon class="mr-3 text-xl hover:text-orangeG" icon="bi:whatsapp"></iconify-icon>
            <a class="text-xl" href="https://wa.me/<?= $asesor['number'] ?>"><?= $asesor['number'] ?></a>
        </p>
        <a href="https://wa.me/<?= $asesor['number'] ?>" class="underline text-greenG-mid font-futuraBold">Iniciar chat</a>

    </div>
</div>