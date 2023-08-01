<?php
$id = $args['idP'];
$texto = $args['texto'];
$imagen = $args['imagen'];
?>

<div class="grid grid-cols-1 gs_slide md:grid-cols-2 lg:grid-cols-2 place-items-center">
    <picture>
        <img src="<?= $imagen ?>" alt="historia">
    </picture>
    <div class="w-full p-5 md:p-10">
        <h1 class="text-6xl font-futuraBold text-greenG-mid"><?= $id ?></h1>
        <div class="mb-5 overflow-hidden linea-contenido bg-orangeG"></div>
        <p><?= $texto ?></p>
    </div>
</div>