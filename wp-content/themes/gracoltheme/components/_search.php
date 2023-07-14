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
?>
<section id="searchBar" class="mb-5 bg-greenwhiteG md:p-2">
    <form id="searchPForm" class="grid grid-cols-1 md:grid-cols-3 md:gap-x-5 md:gap-y-8 md:w-4/5 md:mx-auto" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="flex items-center w-full p-3 border md:p-0 border-slate-300 md:border-0">
            <ul class="flex flex-wrap justify-center w-full list-none md:justify-around">
                <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsCali">Cali</label>
                    <input id="gsCali" class="hidden btn-ubicacion" name="searchUbicacion" type="radio" value="Cali" class="text-orangeG ">
                </li>
                <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsPopa">Popayán</label>
                    <input id="gsPopa" class="hidden btn-ubicacion" name="searchUbicacion" type="radio" value="Popayan" class="">
                </li>
                <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsJamu">Jamundí</label>
                    <input id="gsJamu" class="hidden btn-ubicacion" name="searchUbicacion" type="radio" value="Jamundi" class="">
                </li>
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
                <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsAptos">Apartamentos</label>
                    <input id="gsAptos" class="hidden btn-type" name="searchType" type="radio" value="apartamentos">
                </li>
                <li class="flex flex-wrap justify-center flex-auto md:justify-around">
                    <label class="transition-all cursor-pointer hover:text-orangeG hover:font-futuraBold" for="gsHouse">Casas</label>
                    <input id="gsHouse" class="hidden btn-type" name="searchType" type="radio" value="casas">
                </li>
            </ul>
        </div>
    </form>
</section>