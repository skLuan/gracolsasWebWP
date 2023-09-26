<?php
global $gsBarrio;
global $gsCiudad;
function normalize($string)
{
    $table = array(
        'Š' => 'S', 'š' => 's', 'Đ' => 'Dj', 'đ' => 'dj', 'Ž' => 'Z', 'ž' => 'z', 'Č' => 'C', 'č' => 'c', 'Ć' => 'C', 'ć' => 'c',
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
        'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O',
        'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c', 'è' => 'e', 'é' => 'e',
        'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o',
        'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ý' => 'y', 'ý' => 'y', 'þ' => 'b',
        'ÿ' => 'y', 'Ŕ' => 'R', 'ŕ' => 'r',
    );

    return strtr($string, $table);
}
$urls = [
    'principalGoogle' => URL_GOOGLE_PRINCIPAL,
    'principalWaze' => URL_WAZE_PRINCIPAL,
    'ciudadelaBosqueGoogle' => URL_GOOGLE_CIUDADELABOSQUE,
    'ciudadelaBosqueWaze' => URL_WAZE_CIUDADELABOSQUE,
    'JamundiGoogle' => URL_GOOGLE_JAMUNDI,
    'JamundiWaze' => URL_WAZE_JAMUNDI,
];
$id = get_the_ID();

$ciudadela = get_the_terms($id, 'ciudadela');

!isset($gsBarrio) ? $gsBarrio = get_post_meta($id, 'gs_barrio', true) : '';
!isset($gsCiudad) ? $gsCiudad = get_post_meta($id, 'gs_ciudad', true) : '';
$gsCiudadSlug = normalize($gsCiudad);
$gsCiudadSlug = strtolower($gsCiudadSlug);
$select = '';

if ($gsCiudadSlug == 'jamundi') {
    $select = 'jamundi';
    $googleMap = $urls['JamundiGoogle'];
    $wazeMap = $urls['JamundiWaze'];
} elseif ($gsCiudadSlug == 'popayan') {
    $select = 'popayan';
    $googleMap = $urls['principalGoogle'];
    $wazeMap = $urls['principalWaze'];
}
try {
    $ciudadela_bosque = 15;
    if ($ciudadela[0]->term_id == $ciudadela_bosque) {
        $select = 'popabosque';
        $googleMap = $urls['ciudadelaBosqueGoogle'];
        $wazeMap = $urls['ciudadelaBosqueWaze'];
    }
    //code...
} catch (\Throwable $th) {
    //throw $th;
}

// ---- Este es un parche para que los proyectos marsella y puerto madero sean ligeramente diferentes ya que
// ---- cuentan con un movimiento diferente
$localBarrio;
$marsella_id = 14;
$puerto_id = 42;
switch (get_the_ID()) {
    case $marsella_id:
        # code...
        $localBarrio = 'Sala de ventas <br> Calle 34 Nte #13';
        break;

    case $puerto_id:
        $localBarrio = 'Calle 25  N #240';
        $googleMap = 'https://maps.app.goo.gl/CtUPNHg75FTft2iK8';
        $wazeMap = 'https://www.waze.com/es/live-map/directions?from=place.ChIJsUxwDIoDMI4Rg9LJSbVY90c';
        $select = 'puertoM';
        break;

    default:
        # code...
        $localBarrio = $gsBarrio;
        break;
}
// ---- Fin del parche ------------------------------------------------------------------------------
?>
<section id="UbicacionProyecto" class="grid grid-cols-1 gap-5 mx-auto shadow-lg max-w-screen-2xl lg:grid-cols-2">
    <figure class="overflow-hidden lg:col-span-full">
        <picture class="h-fit">
            <img class="lazyload max-w-none -translate-x-[38%] lg:-translate-x-0 h-56 lg:h-[unset] lg:max-w-full" src="low-quality.jpg" data-src="<?= IMAGE . 'B_UbicacionP.jpg' ?>" alt="">
        </picture>
    </figure>
    <div class="lg:pl-5" id="C_ProjectMap">
        <div class="p-5 lg:p-10">
            <?php if ($select == 'jamundi') : ?>
                <!-- Jamundi -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3161.629375516968!2d-76.53085317595833!3d3.249542835381717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e309f6cfde3e887%3A0x424c825c3a7c8f05!2sCONSTRUCTORA%20GRACOL%2C%20Proyecto%20Ciudadela%20las%20Palmas!5e0!3m2!1ses!2sco!4v1691168790698!5m2!1ses!2sco" class="w-full h-80 lg:w-[600px] lg:h-[450px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php elseif ($select == 'popayan') : ?>
                <!-- Principal -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6512.977147216908!2d-76.59040817642936!3d2.468374975510071!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3003bed1893cdf%3A0x8ab479c933cddd34!2sSala%20ventas%20Constructora%20GRACOL!5e0!3m2!1ses!2sco!4v1691169778521!5m2!1ses!2sco" class="w-full h-80 lg:w-[600px] lg:h-[450px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php elseif ($select == 'popabosque') : ?>
                <!-- Ciudadela bosque -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.069529880306!2d-76.59231249999999!3d2.4839375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e300311c028d47d%3A0xbc4b87efe742074f!2zRkNNNStIMywgUG9wYXnDoW4sIENhdWNh!5e0!3m2!1ses!2sco!4v1691168573328!5m2!1ses!2sco" class="w-full h-80 lg:w-[600px] lg:h-[450px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php elseif ($select == 'puertoM') : ?>
                <!-- Ciudadela bosque -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.164049302833!2d-76.5895816!3d2.4524185999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e30038a0c704cb1%3A0x47f758b549c9d283!2sPuerto%20Madero!5e0!3m2!1ses!2sco!4v1695753783556!5m2!1ses!2sco" class="w-full h-80 lg:w-[600px] lg:h-[450px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php endif; ?>
        </div>
    </div>
    <article class="flex flex-col items-center justify-center px-5 lg:px-20">
        <h3 class="my-3 text-4xl text-center font-futuraBold text-greenG drop-shadow"><?= $localBarrio ?></h3>
        <div class="flex flex-row items-end justify-around w-full mt-5 mb-10 lg:my-5">
            <?php if (isset($googleMap) && $googleMap !== '') : ?>
                <a class="underline font-futuraBold text-grayG" target="_blank" href="<?= $googleMap ?>"><iconify-icon class="mr-3 text-5xl" icon="logos:google-maps"></iconify-icon> Ir con Google maps</a>
            <?php endif; ?>
            <?php if (isset($wazeMap) && $wazeMap !== '') : ?>
                <a class="underline font-futuraBold text-grayG" target="_blank" href="<?= $wazeMap ?>"><iconify-icon class="pt-4 mr-3 text-5xl text-gray-600 align-text-bottom" icon="simple-icons:waze"></iconify-icon>Ir con Waze</a>
            <?php endif; ?>
        </div>
    </article>
</section>