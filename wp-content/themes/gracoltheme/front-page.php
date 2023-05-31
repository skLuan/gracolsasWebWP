<?php get_header() ?>
<main class="w-full mt-24">
    <?php while (have_posts()) {
        the_post();
        the_content();
    }
    ?>
    <!-- Esto tiene que ir dentro del contenido como bloque -->

    <!-- Buscador -->
    <section class="bg-greenwhiteG md:p-2 mb-5">
        <div class="grid grid-cols-1  md:grid-cols-3 md:gap-x-5 md:gap-y-8 md:w-4/5 md:mx-auto">
            <div class="w-full flex items-center p-3 md:p-0 border border-slate-300 md:border-0">
                <ul class="list-none flex flex-wrap justify-center md:justify-around w-full">
                    <li class="flex-auto flex flex-wrap justify-center md:justify-around"><a href="#" class="text-orangeG ">Cali</a></li>
                    <li class="flex-auto flex flex-wrap justify-center md:justify-around"><a href="#" class="">Popayán</a></li>
                    <li class="flex-auto flex flex-wrap justify-center md:justify-around"><a href="#" class="">Jamundí</a></li>
                </ul>
            </div>
            <div class="flex p-1 md:p-0">
                <input type="text" placeholder="Buscar proyectos" 
                class="
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
                    <li class="flex-auto flex flex-wrap justify-center md:justify-around"><a href="#" class="text-orangeG">Todos</a></li>
                    <li class="flex-auto flex flex-wrap justify-center md:justify-around"><a href="#">Apartamento</a></li>
                    <li class="flex-auto flex flex-wrap justify-center md:justify-around"><a href="#">Casa</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section class="grid mx-auto text-center mb-2">
        <p>Viendo <strong>3</strong> de <strong>5</strong></p>
    </section>

    <section id="Loop-principal" class="max-w-screen-2xl mx-auto px-5 mb-5">
        <?= get_template_part('./components/sections/loop', 'home') ?>
    </section>

    <section class="w-full md:w-4/5 md:mx-auto gap-y-8 mt-10 mb-10">
        <div class="flex flex-col w-full bg-cover bg-center text-center p-3" style="background-image: url('<?= IMAGE . 'card-compracasitas.png' ?>'); height: 312px">
            <div class="flex-auto"><img class="mx-auto" src="<?= IMAGE . 'titulo-card-casitas.png' ?>" alt="Paso a paso para comprar tu vivienda" /></div>
            <div class="flex-auto">
                <button class="py-3 px-4 text-whiteG font-bold rounded border-white border-2" style="background-color: #1E1E1E99">En colombia</button>
                <button class="py-3 px-4 text-yellowG font-bold rounded border-yellowG border-2" style="background-color: #1E1E1E99">En el exterior</button>
            </div>
           
        </div>
        <div class="w-full bg-cover bg-center text-center h-24 md:h-40" style="background-image: url('<?= IMAGE . 'ultimas-noticias.png' ?>');"></div>
    </section>

    <section class="md:max-w-screen-2xl md:mx-auto mt-10 mb-10 relative overflow-auto">
        <div class="md:grid md:grid-cols-3 md:gap-x-5 md:gap-y-8 md:w-4/5 md:mx-auto relative w-full flex gap-6 snap-x overflow-x-auto">

            <div class="snap-center shrink-0 rounded-sm bg-white shadow-lg">
                <div class="shrink-0 w-64 md:w-full">
                    <div class="bg-cover bg-center" style="background-image: url('<?= IMAGE . 'img-post.png' ?>'); height: 170px"></div>
                    <article class="p-3 text-greenG-mid">
                        <h3 class="font-futuraBold text-2xl text-orangeG"><a href="#">Titulo que se alarga para ver como se ve</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.</p>
                        <div class="w-full text-right">
                            <p class="text-orangeG text-lg font-futuraBold">Ver más</p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="snap-center shrink-0 rounded-sm bg-white shadow-lg">
                <div class="shrink-0 w-64 md:w-full">
                    <div class="bg-cover bg-center" style="background-image: url('<?= IMAGE . 'img-post.png' ?>'); height: 170px"></div>
                    <article class="p-3 text-greenG-mid">
                        <h3 class="font-futuraBold text-2xl text-orangeG"><a href="#">Titulo que se alarga para ver como se ve</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.</p>
                        <div class="w-full text-right">
                            <p class="text-orangeG text-lg font-futuraBold">Ver más</p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="snap-center shrink-0 rounded-sm bg-white shadow-lg">
                <div class="shrink-0 w-64 md:w-full">
                    <div class="bg-cover bg-center" style="background-image: url('<?= IMAGE . 'img-post.png' ?>'); height: 170px"></div>
                    <article class="p-3 text-greenG-mid">
                        <h3 class="font-futuraBold text-2xl text-orangeG"><a href="#">Titulo que se alarga para ver como se ve</a></h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.</p>
                        <div class="w-full text-right">
                            <p class="text-orangeG text-lg font-futuraBold">Ver más</p>
                        </div>
                    </article>
                </div>
            </div>

        </div>
    </section>

    <section class="max-w-screen-2xl mx-auto mt-10 mb-10">
        <div class="text-center grid justify-items-center mt-10 mb-5">
            <h2 class="text-orangeG font-futuraBold text-3xl mt-3">Experiencia Gracol</h2>
        </div>

        <div class="grid grid-cols-1 gap-x-5 gap-y-8 w-full md:w-4/5 md:mx-auto mb-5">
            <div class="grid md:grid-cols-10 bg-greenwhiteG w-full text-left">
                <picture class="grid md:col-span-3 justify-items-center">
                    <img class="" src="<?= IMAGE . 'people1.png' ?>" alt="Juanita Gomez Herrera" />
                </picture>
                <article class="relative md:col-span-7 pb-6 md:p-5">
                    <div class="p-5 relative">
                        <h3 class="font-futuraBold text-3xl text-greenG">Juanita Gomez Herrera</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer augue felis, malesuada et eros a, pulvinar sollicitudin risus. Aenean iaculis tempus nisl, in venenatis tellus cursus eget. Fusce odio tortor, tempor et nisi a, feugiat dapibus mi. Curabitur ornare malesuada magna, ut dictum turpis scelerisque nec. Nullam dignissim, dolor at vehicula efficitur, nibh ante auctor felis, eget cursus est urna in dui. Vivamus dolor eros, auctor vitae ullamcorper vel, facilisis vitae enim. Ut et pellentesque tellus. Praesent dapibus mollis condimentum. Morbi id semper metus, non eleifend purus.
                        </p>
                        
                    </div>
                    <div class="float-left  bg-orangeG h-[38px] w-[200px] absolute bottom-0 left-4 md:left-10"></div>
                </article>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-x-5 gap-y-8 w-full md:w-4/5 md:mx-auto mb-5">
            <div class="flex flex-col-reverse md:grid md:grid-cols-10 bg-greenwhiteG w-full text-left">
                <article class="relative md:col-span-7 pb-6 md:p-5">
                    <div class="p-5 relative">
                        <h3 class="font-futuraBold text-3xl text-greenG">Carlos Pérez Moreno</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer augue felis, malesuada et eros a, pulvinar sollicitudin risus. Aenean iaculis tempus nisl, in venenatis tellus cursus eget. Fusce odio tortor, tempor et nisi a, feugiat dapibus mi. Curabitur ornare malesuada magna, ut dictum turpis scelerisque nec. Nullam dignissim, dolor at vehicula efficitur, nibh ante auctor felis, eget cursus est urna in dui. Vivamus dolor eros, auctor vitae ullamcorper vel, facilisis vitae enim. Ut et pellentesque tellus. Praesent dapibus mollis condimentum. Morbi id semper metus, non eleifend purus.
                        </p>
                        
                    </div>
                    <div class="float-left  bg-orangeG h-[38px] w-[200px] absolute bottom-0 right-10"></div>
                </article>
                <picture class="grid md:col-span-3 justify-items-center text-right">
                    <img src="<?= IMAGE . 'people2.png' ?>" alt="Carlos Pérez Moreno" />
                </picture>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-x-5 gap-y-8 w-full md:w-4/5 md:mx-auto mb-5">
            <div class="grid md:grid-cols-10 bg-greenwhiteG w-full text-left">
                <picture class="grid md:col-span-3 justify-items-center">
                    <img src="<?= IMAGE . 'people3.png' ?>" alt="Yolanda Carabalí" />
                </picture>
                <article class="relative md:col-span-7 pb-6 md:p-5">
                    <div class="p-5 relative">
                        <h3 class="font-futuraBold text-3xl text-greenG">Yolanda Carabalí</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer augue felis, malesuada et eros a, pulvinar sollicitudin risus. Aenean iaculis tempus nisl, in venenatis tellus cursus eget. Fusce odio tortor, tempor et nisi a, feugiat dapibus mi. Curabitur ornare malesuada magna, ut dictum turpis scelerisque nec. Nullam dignissim, dolor at vehicula efficitur, nibh ante auctor felis, eget cursus est urna in dui. Vivamus dolor eros, auctor vitae ullamcorper vel, facilisis vitae enim. Ut et pellentesque tellus. Praesent dapibus mollis condimentum. Morbi id semper metus, non eleifend purus.
                        </p>
                        
                    </div>
                    <div class="float-left  bg-orangeG h-[38px] w-[200px] absolute bottom-0 left-4 md:left-10"></div>
                </article>
            </div>
        </div>
    </section>

    <section class="w-full bg-white pt-10 pb-5">
        <div class="text-center grid justify-items-center">
            <img class="mb-3" src="<?= IMAGE . 'pregunta.png' ?>" alt="Preguntas Frecuentes" />
            <h2 class="text-yellowG font-futuraBold text-3xl mt-3">Preguntas Frecuentes</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-8 w-4/5 mx-auto mb-5">
            <div>
                <button class="accordion text-greenG font-futuraBold"><span class="t-accordion">Esta es una pregunta?</span></button>
                <div class="panel">
                <p class="text-base text-greenG m-2">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante.</p>
                </div>
            </div>

            <div>
                <button class="accordion text-greenG font-futuraBold"><span class="t-accordion">Esta es una pregunta?</span></button>
                <div class="panel">
                <p class="text-base text-greenG m-2">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante.</p>
                </div>
            </div>

            <div>
                <button class="accordion text-greenG font-futuraBold"><span class="t-accordion">Esta es una pregunta?</span></button>
                <div class="panel">
                <p class="text-base text-greenG m-2">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante.</p>
                </div>
            </div>

            <div>
                <button class="accordion text-greenG font-futuraBold"><span class="t-accordion">Esta es una pregunta?</span></button>
                <div class="panel">
                <p class="text-base text-greenG m-2">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante.</p>
                </div>
            </div>

            <div>
                <button class="accordion text-greenG font-futuraBold"><span class="t-accordion">Esta es una pregunta?</span></button>
                <div class="panel">
                <p class="text-base text-greenG m-2">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante.</p>
                </div>
            </div>

            <div>
                <button class="accordion text-greenG font-futuraBold"><span class="t-accordion">Esta es una pregunta?</span></button>
                <div class="panel">
                <p class="text-base text-greenG m-2">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante.</p>
                </div>
            </div>
            
        </div>

        <div class="text-center grid justify-items-center mb-10"> <button class="font-futuraBold border border-yellowG text-yellowG rounded px-4 py-1">Ver todas las preguntas</button></div>
    </section>

    <section class="bg-greenwhiteG p-2 mb-5">
        <div class="grid grid-cols-1 gap-x-5 gap-y-8 w-4/5 mx-auto">
            <div class="w-full flex items-center">
                <ul class="list-none flex flex-wrap justify-around w-full">
                    <li class="flex-auto text-center"><a href="#" class="text-orangeG">Cali</a></li>
                    <li class="flex-auto text-center"><a href="#">Popayán</a></li>
                    <li class="flex-auto text-center"><a href="#">Jamundí</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id="Loop-segundario" class="max-w-screen-2xl mx-auto px-5 mb-5">
        
    <div class="grid grid-cols-1 md:grid-cols-3 gap-x-5 gap-y-8 w-4/5 mx-auto">

        <div class="rounded-sm bg-white shadow-lg">
            <picture class="h-72">
            <img width="1024" height="283" src="https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1024x283.jpg" class="attachment-large size-large wp-post-image" alt="" decoding="async" loading="lazy" srcset="https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1024x283.jpg 1024w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-300x83.jpg 300w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-768x212.jpg 768w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1536x424.jpg 1536w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING.jpg 1920w" sizes="(max-width: 1024px) 100vw, 1024px">
            </picture>
            <article class="p-3 text-greenG-mid">
                <h3 class="font-futuraBold text-2xl text-greenG-mid"><a href="#">Marsella</a></h3>
                <p class="text-orangeG text-lg font-futuraBold">Barrio <a class="text-grayG !font-futura" href="">Ciudad</a></p>
                <div class="flex flex-row">
                    <picture>
                        <img src="" alt="">
                    </picture>
                    <span>Apartamentos</span>
                </div>
            </article>
            <a class="w-full bg-grayG text-whiteG underline text-lg flex items-center justify-center pb-3 pt-2  font-futuraBold" href="#">Ver proyecto</a>
        </div>

        <div class="rounded-sm bg-white shadow-lg">
            <picture class="h-72">
            <img width="1024" height="283" src="https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1024x283.jpg" class="attachment-large size-large wp-post-image" alt="" decoding="async" loading="lazy" srcset="https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1024x283.jpg 1024w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-300x83.jpg 300w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-768x212.jpg 768w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1536x424.jpg 1536w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING.jpg 1920w" sizes="(max-width: 1024px) 100vw, 1024px">
            </picture>
            <article class="p-3 text-greenG-mid">
                <h3 class="font-futuraBold text-2xl text-greenG-mid"><a href="#">Marsella</a></h3>
                <p class="text-orangeG text-lg font-futuraBold">Barrio <a class="text-grayG !font-futura" href="">Ciudad</a></p>
                <div class="flex flex-row">
                    <picture>
                        <img src="" alt="">
                    </picture>
                    <span>Apartamentos</span>
                </div>
            </article>
            <a class="w-full bg-grayG text-whiteG underline text-lg flex items-center justify-center pb-3 pt-2  font-futuraBold" href="#">Ver proyecto</a>
        </div>

        <div class="rounded-sm bg-white shadow-lg">
            <picture class="h-72">
            <img width="1024" height="283" src="https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1024x283.jpg" class="attachment-large size-large wp-post-image" alt="" decoding="async" loading="lazy" srcset="https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1024x283.jpg 1024w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-300x83.jpg 300w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-768x212.jpg 768w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING-1536x424.jpg 1536w, https://localhost/gracolsas.com/wp-content/uploads/banners/BANNER_WEB_LIVING.jpg 1920w" sizes="(max-width: 1024px) 100vw, 1024px">
            </picture>
            <article class="p-3 text-greenG-mid">
                <h3 class="font-futuraBold text-2xl text-greenG-mid"><a href="#">Marsella</a></h3>
                <p class="text-orangeG text-lg font-futuraBold">Barrio <a class="text-grayG !font-futura" href="">Ciudad</a></p>
                <div class="flex flex-row">
                    <picture>
                        <img src="" alt="">
                    </picture>
                    <span>Apartamentos</span>
                </div>
            </article>
            <a class="w-full bg-grayG text-whiteG underline text-lg flex items-center justify-center pb-3 pt-2  font-futuraBold" href="#">Ver proyecto</a>
        </div>

    </div>


    </section>
    
        
    </section>

</main>
<?php get_footer() ?>