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
    <section id="options" class="grid grid-cols-1 mx-auto mb-5 lg:grid-cols-2 lg:grid-rows-none max-w-screen-2xl">

        <div id="pagos" class="grid w-full h-fit pagos justify-items-center">
            <div class="relative flex flex-wrap justify-around w-full h-56 overflow-hidden text-center md:h-80">
                <picture class="absolute z-0 w-full h-full -left-10 md:-left-0">
                    <img class="h-full md:w-full md:h-auto lazyload max-w-none" data-src="<?= IMAGE . 'pagos.jpg' ?>" alt="">
                </picture>
                <div class="z-10 flex items-center w-2/3 ml-auto">
                    <div class="mx-auto">
                        <h2 class="text-3xl md:text-5xl text-orangeG font-futuraBold">Paga tus cuotas</h2>
                        <h3 class="mb-5 md:text-2xl md:pt-3 font-futuraBold text-grayG">fácil, rápido y seguro</h3>
                        <button id="btn_pagos" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold">Encuentra tu Broker</button>
                    </div>
                </div>

            </div>
            <div id="container_pagos" class="grid w-full grid-cols-1 p-5 bg-whiteG lg:grid-cols-3">
                <div class="w-full p-4 text-center">
                    <a href="" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold text-center">Link de Pago 1</a>
                    <div class="flex flex-wrap justify-center w-full">
                        <a href="#" class="flex flex-wrap items-center justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 1</span></a>
                        <a href="#" class="flex flex-wrap items-center justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 2</span></a>

                    </div>
                </div>
                <div class="w-full p-4 text-center">
                    <a href="" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold text-center">Link de Pago 2</a>
                    <div class="flex flex-wrap justify-center w-full">
                        <a href="#" class="flex flex-wrap items-center justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 3</span></a>
                        <a href="#" class="flex flex-wrap items-center justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 4</span></a>

                    </div>
                </div>
                <div class="w-full p-4 text-center">
                    <a href="" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold text-center">Link de Pago 3</a>
                    <div class="flex flex-wrap justify-center w-full">
                        <a href="#" class="flex flex-wrap items-center justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 5</span></a>
                        <a href="#" class="flex flex-wrap items-center justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 6</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="quejaReclamo" class="grid w-full queja justify-items-center">
            <div class="grid w-full p-4 md:flex md:justify-around justify-items-center">
                <div class="flex items-center w-2/5">
                    <img src="<?= IMAGE . 'queja.png' ?>" alt="queja" class="w-full">
                </div>
                <div class="flex items-center md:w-3/5">
                    <div class="p-4 text-center">
                        <h2 class="text-3xl text-center text-orangeG font-futuraBold">¿Alguna queja o reclamo?</h2>
                        <p class="mb-5 text-center text-1xl font-futuraBold text-grayG">Si tienes alguna queja o reclamo de nuestro servicio dale clic al botón para redireccionarte al formulario de quejas o reclamos.</p>
                        <button id="btn_quejas" class="px-5 py-1 mt-5 text-orangeG border-[3px] border-orangeG rounded bg-transparent font-futuraBold">Quejas o reclamos</button>
                    </div>
                </div>
            </div>
            <div id="form_quejasreclamos_container" class="w-10/12 transition-all">
                <?= get_template_part('components/_form', 'postventa') ?>
            </div>
        </div>
        <div id="Garantias">
            <div class="grid w-full md:flex md:justify-around justify-items-center">
                <div class="flex items-center md:w-3/5">
                    <div class="p-5 md:p-10 lg:flex lg:flex-col">
                        <h2 class="text-3xl text-center text-greenG font-futuraBold">Garantías y post ventas</h2>
                        <p class="mb-5 text-center text-1xl font-futuraBold text-grayG">Tienes algún problema con tu vivienda? escribenos para solucionarlo lo más rapido posible</p>
                        <button id="btn_garantia" class="px-5 mx-auto text-center py-1 text-orangeG border-[3px] border-orangeG rounded bg-transparent font-futuraBold">Abrir formulario</button>
                    </div>
                </div>
                <div class="flex items-center w-2/3 md:w-2/5">
                    <img src="<?= IMAGE . 'garantia.png' ?>" alt="queja" class="w-full">
                </div>
            </div>
            <div id="form_postventa_container">
                <?= get_template_part('components/_form', 'postventa') ?>
            </div>
        </div>
        <div id="Encuentra" class="w-full">
            <div class="grid justify-around w-full grid-cols-1 px-5 py-3 text-center bg-center bg-cover md:grid-cols-2" style="background-image: url('<?= IMAGE . 'ayudas.png' ?>'); height: 312px; ">
                <div class="flex items-center flex-auto w-3/5 md:w-auto">
                    <div class="p-0 md:p-4">
                        <h2 class="text-3xl text-center text-greenG font-futuraBold">Manual de usuarios</h2>
                        <p class="mb-5 text-center text-1xl font-futuraBold text-grayG">Descubre todos tus derechos y responsabilidades</p>
                        <a href="" class="py-1 mt-5 text-greenG border-[3px] block border-greenG rounded bg-transparent font-futuraBold">Ir a los manuales</a>
                    </div>
                </div>
                <div class="flex-auto"></div>
            </div>
        </div>
    </section>
    <?= get_template_part('./components/sections/_loop', 'faq') ?>
    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>

</main>



<?php get_footer() ?>