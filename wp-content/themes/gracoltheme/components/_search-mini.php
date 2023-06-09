<section id="searchBar" class="bg-greenwhiteG md:p-2 mb-5">
    <form id="searchUbiOnly" class="grid grid-cols-1  md:grid-cols-3 md:gap-x-5 md:gap-y-8 md:w-4/5 md:mx-auto">
        <div class="w-full flex items-center p-3 md:p-0 border border-slate-300 md:border-0">
            <ul class="list-none flex flex-wrap justify-center md:justify-around w-full">
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsCaliMini">Cali</label>
                    <input id="gsCaliMini" class="btn-ubicacion hidden" name="searchUbicacionMini" type="radio" value="Cali" class="text-orangeG ">
                </li>
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsPopaMini">Popayán</label>
                    <input id="gsPopaMini" class="btn-ubicacion hidden" name="searchUbicacionMini" type="radio" value="Popayan" class="">
                </li>
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsJamuMini">Jamundí</label>
                    <input id="gsJamuMini" class="btn-ubicacion hidden" name="searchUbicacionMini" type="radio" value="Jamundi" class="">
                </li>
                <li class="flex-auto flex flex-wrap justify-center md:justify-around">
                    <label class="cursor-pointer hover:text-orangeG hover:font-futuraBold transition-all" for="gsAllMini">Todas</label>
                    <input id="gsAllMini" class="btn-ubicacion hidden" name="searchUbicacionMini" type="radio" checked value="all" class="">
                </li>
            </ul>
        </div>
    </form>
</section>