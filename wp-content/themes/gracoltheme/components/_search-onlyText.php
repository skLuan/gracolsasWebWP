<section id="" class="bg-greenwhiteG md:p-2">
    <form id="searchPFormOnly" class="flex md:w-4/5 md:mx-auto" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <div class="flex p-1 mx-auto md:p-0">
            <!-- Aqui va el input que busca -->
            <!-- Aquí se encuentra el campo de búsqueda de WordPress -->
            <?php get_search_form(); ?>
            <button class="p-2 rounded-r-lg bg-orangeG">
                <img src="<?= IMAGE . 'icon-lupa.png' ?>" alt="Buscar" />
            </button>
        </div>
    </form>
</section>