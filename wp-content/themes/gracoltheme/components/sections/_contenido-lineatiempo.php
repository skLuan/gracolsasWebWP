<?php
    $id = $args['idP'];
    $texto = $args['texto'];
    $imagen = $args['imagen'];
?>

<div class="gs_slide grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 place-items-center">
    <img src="<?= $imagen ?>" alt="historia">
    <div class="p-5 md:p-10">
        <h1 class="text-6xl font-futuraBold text-greenG-mid"><?= $id ?></h1>
        <div class="linea-contenido bg-orangeG overflow-hidden mb-5"></div>
        <p><?= $texto ?></p>
    </div>
</div>

<div class="gs_slide grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 place-items-center">
    <img src="<?= $imagen ?>" alt="historia">
    <div class="p-5 md:p-10">
        <h1 class="text-6xl font-futuraBold text-greenG-mid"><?= $id ?></h1>
        <div class="linea-contenido bg-orangeG overflow-hidden mb-5"></div>
        <p><?= $texto ?></p>
    </div>
</div>

<div class="gs_slide grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 place-items-center">
    <img src="<?= $imagen ?>" alt="historia">
    <div class="p-5 md:p-10">
        <h1 class="text-6xl font-futuraBold text-greenG-mid"><?= $id ?></h1>
        <div class="linea-contenido bg-orangeG overflow-hidden mb-5"></div>
        <p><?= $texto ?></p>
    </div>
</div>



