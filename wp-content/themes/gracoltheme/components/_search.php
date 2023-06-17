<section id="searchBar" class="bg-greenwhiteG md:p-2 mb-5">
    <form id="searchPForm" class="grid grid-cols-1  md:grid-cols-3 md:gap-x-5 md:gap-y-8 md:w-4/5 md:mx-auto">
        <div class="w-full flex items-center p-3 md:p-0 border border-slate-300 md:border-0">
            <ul class="list-none flex flex-wrap justify-center md:justify-around w-full">
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsCali">Cali</label>
                    <input id="gsCali" class="btn-ubicacion hidden" name="searchUbicacion" type="radio" value="Cali" class="text-orangeG ">
                </li>
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsPopa">Popayán</label>
                    <input id="gsPopa" class="btn-ubicacion hidden" name="searchUbicacion" type="radio" value="Popayan" class="">
                </li>
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsJamu">Jamundí</label>
                    <input id="gsJamu" class="btn-ubicacion hidden" name="searchUbicacion" type="radio" value="Jamundi" class="">
                </li>
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsAll">Todas</label>
                    <input id="gsAll" class="btn-ubicacion hidden" name="searchUbicacion" type="radio" checked value="all" class="">
                </li>
            </ul>
        </div>
        <div class="flex p-1 md:p-0">
            <input type="text" placeholder="Buscar proyectos" class="
                px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 
                focus:outline-none focus:border-slate-300 focus:ring-slate-300 
                block w-full rounded-l-lg sm:text-sm focus:ring-1  
                disabled:shadow-none" />
            <button class="bg-orangeG p-2 rounded-r-lg">
                <img src="<?= IMAGE . 'icon-lupa.png' ?>" alt="Buscar" />
            </button>
        </div>
        <div class="w-full flex items-center p-3 md:p-0 border border-slate-300 md:border-0">
            <ul class="list-none flex flex-wrap justify-around w-full">
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsallT">Todas</label>
                    <input id="gsallT" class="btn-type hidden" name="searchType" type="radio" value="all" checked class="text-orangeG">
                </li>
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsAptos">Apartamentos</label>
                    <input id="gsAptos" class="btn-type hidden" name="searchType" type="radio" value="apartamentos">
                </li>
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsHouse">Casas</label>
                    <input id="gsHouse" class="btn-type hidden" name="searchType" type="radio" value="casas">
                </li>
            </ul>
        </div>
    </form>
</section>