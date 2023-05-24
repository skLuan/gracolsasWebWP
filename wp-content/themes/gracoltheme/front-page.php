<?php get_header() ?>
<main class="mt-24">
    <?php while (have_posts()) {
        the_post();
        the_content();
    }
    ?>
    <!-- Esto tiene que ir dentro del contenido como bloque -->

    <!-- Buscador -->
    <section class="container mx-auto bg-greenwhiteG p-2 mb-5">
        <div class="grid grid-cols-3 gap-x-5 gap-y-8 w-4/5 mx-auto">
            <div class="w-full flex items-center">
                <ul class="list-none flex flex-wrap justify-around w-full">
                    <li class="flex-auto"><a href="#" class="text-orangeG">Cali</a></li>
                    <li class="flex-auto"><a href="#">Popayán</a></li>
                    <li class="flex-auto"><a href="#">Jamundí</a></li>
                </ul>
            </div>
            <div class="flex">
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
            <div>
                <ul class="list-none flex flex-wrap">
                    <li class="flex-auto"><a href="#" class="text-orangeG">Todos</a></li>
                    <li class="flex-auto"><a href="#">Apartamento</a></li>
                    <li class="flex-auto"><a href="#">Casa</a></li>
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

    <section class="w-4/5 mx-auto">
        <div class="flex flex-col w-full bg-cover bg-center text-center" style="background-image: url('<?= IMAGE . 'card-compracasitas.png' ?>'); height: 400px">
            <img class="mx-auto" src="<?= IMAGE . 'titulo-card-casitas.png' ?>" alt="Paso a paso para comprar tu vivienda" />
            <div>
                <button class="py-3 px-4 text-whiteG font-bold rounded border-white border-2" style="background-color: #1E1E1E99">En colombia</button>
                <button class="py-3 px-4 text-yellowG font-bold rounded border-yellowG border-2" style="background-color: #1E1E1E99">En el exterior</button>
            </div>
           
        </div>
        <div class="w-full bg-cover bg-center text-center" style="background-image: url('<?= IMAGE . 'ultimas-noticias.png' ?>'); height: 170px"></div>
    </section>

    <section class="max-w-screen-2xl mx-auto mt-5 mb-5">
        <div class="grid grid-cols-3 gap-x-5 gap-y-8 w-4/5 mx-auto">

        <div class="rounded-sm bg-white shadow-lg">
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
    </section>

</main>
<?php get_footer() ?>