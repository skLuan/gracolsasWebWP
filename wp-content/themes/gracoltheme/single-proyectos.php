<?php get_header() ?>
<main class="mt-24">
    <?php while (have_posts()) :
        the_post();
    ?>
        <picture class="w-screen overflow-hidden h-[400px]">
            <img class="w-full" src="<?= the_post_thumbnail_url('original') ?>" alt="">
        </picture>
        <?= get_template_part('components/sections/_proyecto', 'mainInfo') ?>
        <?= get_template_part('components/sections/_proyecto', 'galeries') ?>

        <section class="max-w-screen-2xl mx-auto relative sectionAsesores w-full grid grid-cols-2">
            <div class="p-10 flex flex-col">
                <h3 class="text-whiteG text-4xl text-center font-futuraBold drop-shadow-lg">Estamos listos <br> para atenderte</h3>
                <a href="" class="bg-orangeG rounded py-1 px-3 my-10 text-whiteG text-xl font-futuraBold mx-auto">Escríbenos</a>
                <div class="pl-20">
                    <?= get_template_part('components/cards/card', 'asesor') ?>
                    <?= get_template_part('components/cards/card', 'asesor') ?>
                    <?= get_template_part('components/cards/card', 'asesor') ?>
                </div>
            </div>
        </section>

        <section>

        </section>
    <?php
    endwhile; ?>
    <div class="bg-orangeG py-2 text-center text-white fixed bottom-0 w-full z-50">Escríbenos para más información <a href="" class="underline font-futuraBold ml-2 text-lg">Ir al formulario</a></div>
</main>
<?php get_footer() ?>