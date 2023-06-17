<?php get_header() ?>
<main class="w-full lg:mt-24">
    <section class="w-full">
        <figure class="relative">
            <picture>
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'baner_servicioCliente.png' ?>">
                <img src="<?= IMAGE . 'baner_servicioCliente.png' ?>" alt="">
            </picture>
            <div class="absolute top-0 left-0 w-full h-full max-w-screen-2xl grid grid-cols-12 gap-5">
                <div class="col-start-2 col-span-6 text-center flex flex-col justify-center items-center">
                    <h2 class="text-greenG text-6xl font-futuraBold">Servicio al cliente</h2>
                    <p class="w-2/3 text-lg leading-tight my-5 text-greenG-mid">Si tienes cualquier pregunta o requerimiento, nuestro equipo de asesores esta siempre dispuesto a ayudarte.</p>
                    <div>
                        <div class="flex flex-row items-center">
                            <iconify-icon class="text-orangeG text-3xl mr-3" icon="material-symbols:alternate-email-sharp"></iconify-icon><a href="">CorreoGracol@gracol.com</a>
                        </div>
                        <div class="flex flex-row items-center text-left">
                            <iconify-icon class="text-orangeG text-3xl mr-3" icon="ic:outline-whatsapp"></iconify-icon>
                            <a href="">+00 0000000</a>
                        </div>
                    </div>
                    <a href="" class="bg-orangeG text-white mt-5 font-futuraBold py-1 px-5 rounded">Contáctenos</a>
                </div>
            </div>
        </figure>
    </section>
    <section id="options" class="max-w-screen-2xl grid grid-cols-2 grid-rows-2 mx-auto px-5 mb-5">
        <div id="pagos"></div>
        <div id="quejaReclamo"></div>
        <div id="Encuentra"></div>
        <div id="Garantias"></div>
    </section>
    <?= get_template_part('./components/sections/_loop', 'faq') ?>
    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>

</main>



<?php get_footer() ?>