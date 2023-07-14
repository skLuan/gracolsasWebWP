<?php get_header() ?>
<main class="w-full lg:mt-24">
    <section class="w-full mt-10 bg-white lg:mt-0 lg:pt-10">
        <figure class="relative h-[450px] lg:h-[unset] bg-white">
            <picture class="absolute lg:static z-0 right-[-169px] bottom-0 lg:bottom-[unset]">
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'baner_servicioCliente.png' ?>">
                <img class="max-w-none lg:max-w-full h-60 lg:h-[unset] lazyload" data-src="<?= IMAGE . 'baner_servicioCliente.png' ?>" alt="banner servicio al cliente">
            </picture>
            <div class="absolute top-0 left-0 grid w-full h-full lg:gap-5 lg:grid-cols-12 max-w-screen-2xl">
                <div class="flex flex-col items-center mt-10 text-center lg:mt-0 lg:justify-center lg:col-start-2 lg:mb-5 lg:col-span-6">
                    <h2 class="text-4xl lg:text-6xl text-greenG font-futuraBold">Servicio al cliente</h2>
                    <p class="w-2/3 my-5 text-lg leading-tight text-greenG-mid">Si tienes cualquier pregunta o requerimiento, nuestro equipo de asesores esta siempre dispuesto a ayudarte.</p>
                    <div>
                        <div class="flex flex-row items-center">
                            <iconify-icon class="mr-3 text-3xl text-orangeG" icon="material-symbols:alternate-email-sharp"></iconify-icon><a class="" href="mailto:servicioalcliente@gracolsas.com">servicioalcliente@gracolsas.com</a>
                        </div>
                        <div class="flex flex-row items-center text-left">
                            <iconify-icon class="mr-3 text-3xl text-orangeG" icon="ic:outline-whatsapp"></iconify-icon>
                            <a class="" href="https://wa.me/<?= NUM_SERVICIOCLIENTE ?>"><?= NUM_SERVICIOCLIENTE_PRINT ?></a>
                        </div>
                    </div>
                    <a href="" class="px-5 py-1 mt-5 text-white rounded bg-orangeG font-futuraBold">Contáctenos</a>
                </div>
            </div>
        </figure>
    </section>
    <section id="options" class="grid grid-cols-2 grid-rows-2 px-5 mx-auto mt-5 mb-5 max-w-screen-2xl">

        <div id="pagos" class="w-full pagos">
            <div class="flex flex-wrap justify-around w-full p-3 text-center bg-center bg-cover" style="background-color: #dde3e7; background-image: url('<?= IMAGE . 'pagos.jpg' ?>');background-position-x: -100px; height: 312px; ">
                <div class="flex-auto"></div>
                <div class="flex-auto"></div>
                <div class="flex items-center flex-auto">
                    <div>
                        <h2 class="text-6xl text-orangeG font-futuraBold">Pagos</h2>
                        <h3 class="text-2xl font-futuraBold text-grayG">por proyectos</h3>
                    </div>
                </div>

            </div>
        </div>

        <div id="quejaReclamo" class="w-full queja">
            <div class="flex justify-around w-full">
                <img src="<?= IMAGE . 'queja.png' ?>" alt="queja" width="300px">
                <div class="flex items-center">
                    <div class="p-4">
                        <h2 class="text-3xl text-center text-orangeG font-futuraBold">¿Alguna queja o reclamo?</h2>
                        <p class="text-center text-1xl font-futuraBold text-grayG">Si tienes alguna queja o reclamo de nuestro servicio dale clic al botón para redireccionarte al formulario de quejas o reclamos.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="Encuentra" class="w-full">
            <div class="grid justify-around w-full grid-cols-2 p-3 text-center bg-center bg-cover" style="background-image: url('<?= IMAGE . 'ayudas.png' ?>'); height: 312px; ">
                <div class="flex items-center flex-auto">
                    <div class="p-4">
                        <h2 class="text-3xl text-center text-greenG font-futuraBold">¿No has encontrado lo que buscas?</h2>
                        <p class="text-center text-1xl font-futuraBold text-grayG">Encuentra lo que buscas en nuestra sección de ayudas</p>
                    </div>
                </div>
                <div class="flex-auto"></div>
            </div>
        </div>
        <div id="Garantias">
            <div class="flex justify-end w-full">
                <div class="flex items-center">
                    <div class="p-10">
                        <h2 class="text-3xl text-center text-greenG font-futuraBold">Garantías</h2>
                        <p class="text-justify text-1xl font-futuraBold text-grayG">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.</p>
                        <a class="float-right underline text-orangeG font-futuraBold underline-offset-1" href="#" class="btn">Saber más</a>
                    </div>
                </div>
                <img src="<?= IMAGE . 'garantia.png' ?>" alt="queja" width="300px">
            </div>
        </div>
    </section>
    <?= get_template_part('./components/sections/_loop', 'faq') ?>
    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>

</main>



<?php get_footer() ?>