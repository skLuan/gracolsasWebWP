<?php
function obtenerNombreMes($mesNumero)
{
    return match ($mesNumero) {
        '01' => 'Ene',
        '02' => 'Feb',
        '03' => 'Mar',
        '04' => 'Abr',
        '05' => 'May',
        '06' => 'Jun',
        '07' => 'Jul',
        '08' => 'Ago',
        '09' => 'Sep',
        '10' => 'Oct',
        '11' => 'Nov',
        '12' => 'Dic',
        default => 'mes inválido'
    };
}
if (isset($args['fechas'])) {
    $fechas = $args['fechas'];
    sort($fechas);
    if (is_string($fechas[0])) {
        foreach ($fechas as &$fecha) {
            $dateTime = new DateTime($fecha);
            // Obtener el día, el mes y el año
            $dia = $dateTime->format('d');
            $mesNumero = $dateTime->format('m');
            $anio = $dateTime->format('Y');
            $mesNombre = obtenerNombreMes($mesNumero);
            $fechaNueva = $dia . '/' . $mesNombre . '/' . $anio;
            $fecha = $fechaNueva; //this
        }
    }
}
if (isset($args['title'])) {
    $title = $args['title'];
}
?>

<section class="grid grid-cols-1 gap-5 mx-auto mt-20 lg:grid-cols-12 max-w-screen-2xl">
    <h2 class="text-4xl text-center text-orangeG font-futuraBold lg:col-span-full"><?= $title ?></h2>
    <div class="relative flex flex-row flex-wrap justify-center px-3 lg:col-start-3 lg:px-0 lg:col-span-8 lg:justify-evenly text-greenG">
        <?php
        foreach ($fechas as $fecha) :
        ?>
            <button class="px-4 py-1 m-1 transition-all border rounded punto-tiempo bg-whiteG gs_linea_buton border-greenG lg:px-5 font-futuraBold"><?= $fecha ?></button>
        <?php endforeach; ?>
        <div class="linea-tiempo bg-orangeG"></div>
    </div>
</section>