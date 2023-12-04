<?php
$parent_id = 12; // ID del padre deseado
$args = array(
    'taxonomy' => 'tag-proyecto',
    'parent' => $parent_id,
);

$terms = get_terms($args);
$nameTerms = [];
foreach ($terms as $tag) {
    $name = $tag->name;
    array_push($nameTerms, $name);
}

// - -----------------------------------------------------------------------------------------
// - ----------------------------------------------------------------------------------------- Filtro ciudad
$args = array(
    'post_type' => 'proyectos', // Cambia esto al tipo de post que estás usando
    'posts_per_page' => -1, // Obtener todos los posts
    'meta_query' => array(
        array(
            'key' => 'gs_ciudad', // Cambia esto al nombre del meta dato que deseas verificar
            'compare' => 'EXISTS', // Puedes usar 'EXISTS' para verificar si el meta dato existe en el post
        ),
    ),
    'tax_query'        => array(
        array(
            'taxonomy' => 'categoria-proyecto',
            'field' => 'slug',
            'terms' => 'obras-entregadas',
            'operator' => 'NOT IN'
        ),
    )
);

$query = new WP_Query($args);
$locations = [];
$preFix = 'gs';
if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $gs_ciudad = get_post_meta(get_the_ID(), 'gs_ciudad', true);
        $gs_ciudad_sanitized = remove_accents($gs_ciudad);
        if (!empty($gs_ciudad)) {
            $locations[$gs_ciudad_sanitized] = $gs_ciudad;
        }
    }
    wp_reset_postdata();
}
// -------------------------------------------------------------------
$idPadreTagTipoInmueble = 12; // id
$tipoInmuebles = get_terms(array(
    'taxonomy' => 'tag-proyecto', // Reemplaza esto con el nombre de tu custom tag
    'hide_empty' => true, // Incluye términos aunque estén vacíos
    'parent' => $idPadreTagTipoInmueble,
));
?>
<section id="searchBar" class="mb-5 bg-greenwhiteG md:p-2">
    <form id="searchPForm" class="grid grid-cols-1 md:grid-cols-3 md:gap-x-5 md:gap-y-8 md:w-4/5 md:mx-auto" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="flex items-center w-full p-3 border md:p-0 border-slate-300 md:border-0">
            <ul class="flex flex-wrap justify-center w-full list-none md:justify-around">
                <?php
                foreach ($locations as $location => $title) :
                ?>
                    <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                        <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="<?= $preFix . $location ?>"><?= $title ?></label>
                        <input id="<?= $preFix . $location ?>" class="hidden btn-ubicacion" name="searchUbicacion" type="radio" value="<?= $location ?>" class="text-orangeG ">
                    </li>
                <?php endforeach;                ?>
                <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsAll">Todas</label>
                    <input id="gsAll" class="hidden btn-ubicacion" name="searchUbicacion" type="radio" checked value="all" class="">
                </li>
            </ul>
        </div>
        <div class="flex p-1 md:p-0">
            <!-- Aqui va el input que busca -->
            <!-- Aquí se encuentra el campo de búsqueda de WordPress -->
            <?php get_search_form(); ?>
            <button class="p-2 rounded-r-lg bg-orangeG">
                <img src="<?= IMAGE . 'icon-lupa.png' ?>" alt="Buscar" />
            </button>
        </div>
        <div class="flex items-center w-full p-3 border md:p-0 border-slate-300 md:border-0">
            <ul class="flex flex-wrap justify-around w-full list-none">
                <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsallT">Todas</label>
                    <input id="gsallT" class="hidden btn-type" name="searchType" type="radio" value="all" checked class="text-orangeG">
                </li>
                <?php
                foreach ($tipoInmuebles as $key  => $wpTipoIn) :
                ?>
                    <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                        <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="<?= $preFix . $wpTipoIn->slug ?>"><?= $wpTipoIn->name ?></label>
                        <input id="<?= $preFix . $wpTipoIn->slug ?>" class="hidden btn-type" name="searchType" type="radio" value="<?= $wpTipoIn->slug ?>">
                    </li>
                <?php endforeach;                ?>
                <!-- <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsAptos">Apartamentos</label>
                    <input id="gsAptos" class="hidden btn-type" name="searchType" type="radio" value="apartamentos">
                </li>
                <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsHouse">Casas</label>
                    <input id="gsHouse" class="hidden btn-type" name="searchType" type="radio" value="casas">
                </li> -->
            </ul>
        </div>
    </form>
</section>