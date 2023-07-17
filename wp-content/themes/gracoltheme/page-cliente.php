<?php get_header() ?>
<main class="w-full lg:mt-24">
    <section class="w-full bg-white lg:pt-10">
        <figure class="relative">
            <picture>
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'baner_servicioCliente.png' ?>">
                <img src="<?= IMAGE . 'baner_servicioCliente.png' ?>" alt="">
            </picture>
            <div class="absolute top-0 left-0 grid w-full h-full grid-cols-12 gap-5 max-w-screen-2xl">
                <div class="flex flex-col items-center justify-center col-span-6 col-start-2 mb-5 text-center">
                    <h2 class="text-6xl text-greenG font-futuraBold">Servicio al cliente</h2>
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
    <section id="options" class="grid grid-cols-1  lg:grid-cols-2 lg:grid-rows-2 px-5 mx-auto mt-5 mb-5 max-w-screen-2xl">

        <div id="pagos" class="w-full pagos grid justify-items-center">
            <div class="div-pagos flex flex-wrap justify-around w-full p-3 text-center bg-center bg-cover" 
            style="background: url('<?= IMAGE . 'pagos.jpg' ?>'), #dde3e7;
            background-position-x: -15px;
            background-size: 119%;
            background-position-y: -21px;
            background-repeat: no-repeat;">
                <div class="flex-auto"></div>
                <div class="flex-auto"></div>
                <div class="flex items-center flex-auto pl-10">
                    <div class="pl-10">
                        <h2 class="text-4xl md:text-6xl text-orangeG font-futuraBold">Pagos</h2>
                        <h3 class="md:text-2xl font-futuraBold text-grayG mb-5">por proyectos</h3>
                        <a href="" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold">Encuentra tu Broker</a>
                    </div>
                </div>

            </div>
            <div class="w-full bg-whiteG grid grid-cols-1  lg:grid-cols-3 p-5">
                <div class="w-full p-4 text-center">
                    <a href="" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold text-center">Link de Pago 1</a>
                    <div class="w-full flex flex-wrap justify-center">
                        <a href="#" class="flex items-center flex-wrap justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 1</span></a>
                        <a href="#" class="flex items-center flex-wrap justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 2</span></a>

                    </div>
                </div>
                <div class="w-full p-4 text-center">
                    <a href="" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold text-center">Link de Pago 2</a>
                    <div class="w-full flex flex-wrap justify-center">
                        <a href="#" class="flex items-center flex-wrap justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 3</span></a>
                        <a href="#" class="flex items-center flex-wrap justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 4</span></a>

                    </div>
                </div>
                <div class="w-full p-4 text-center">
                    <a href="" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold text-center">Link de Pago 3</a>
                    <div class="w-full flex flex-wrap justify-center">
                        <a href="#" class="flex items-center flex-wrap justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 5</span></a>
                        <a href="#" class="flex items-center flex-wrap justify-center mt-5 mr-5"><img src="<?= IMAGE . 'logo-proyecto.png' ?>" alt="logo-proyecto"><span>Nombre Proyecto 6</span></a>
                    </div>
                </div>
            </div>
        </div>

        <div id="quejaReclamo" class="w-full queja grid justify-items-center">
            <div class="grid md:flex md:justify-around w-full justify-items-center p-4">
                <div class="w-2/5 flex items-center">
                <img src="<?= IMAGE . 'queja.png' ?>" alt="queja" class="w-full">
                </div>
                <div class="md:w-3/5 flex items-center">
                    <div class="p-4 text-center">
                        <h2 class="text-3xl text-center text-orangeG font-futuraBold">¿Alguna queja o reclamo?</h2>
                        <p class="text-center text-1xl font-futuraBold text-grayG mb-5">Si tienes alguna queja o reclamo de nuestro servicio dale clic al botón para redireccionarte al formulario de quejas o reclamos.</p>
                        <a href="" class="px-5 py-1 mt-5 text-orangeG border border-[3px] border-orangeG rounded bg-transparent font-futuraBold">Quejas o reclamos</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="Encuentra" class="w-full">
            <div class="grid justify-around w-full grid-cols-1 md:grid-cols-2 p-3 text-center bg-center bg-cover" style="background-image: url('<?= IMAGE . 'ayudas.png' ?>'); height: 312px; ">
                <div class="w-3/5 md:w-auto flex items-center flex-auto">
                    <div class="p-0 md:p-4">
                        <h2 class="text-3xl text-center text-greenG font-futuraBold">¿No has encontrado lo que buscas?</h2>
                        <p class="text-center text-1xl font-futuraBold text-grayG mb-5">Encuentra lo que buscas en nuestra sección de ayudas</p>
                        <a href="" class="px-5 py-1 mt-5 text-greenG border border-[3px] border-greenG rounded bg-transparent font-futuraBold">Sección de ayudas</a>
                    </div>
                </div>
                <div class="flex-auto"></div>
            </div>
        </div>
        <div id="Garantias">
            <div class="grid md:flex md:justify-around w-full justify-items-center">
                <div class="md:w-3/5 flex items-center">
                    <div class="p-5 md:p-10">
                        <h2 class="text-3xl text-center text-greenG font-futuraBold">Garantías</h2>
                        <p class="text-justify text-1xl font-futuraBold text-grayG">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.</p>
                        <a class="float-right underline text-orangeG font-futuraBold underline-offset-1" href="#" class="btn">Saber más</a>
                    </div>
                </div>
                <div class="w-2/3 md:w-2/5 flex items-center">
                    <img src="<?= IMAGE . 'garantia.png' ?>" alt="queja" class="w-full">
                </div>
            </div>
        </div>
    </section>
    <?= get_template_part('./components/sections/_loop', 'faq') ?>
    <?= get_template_part('./components/banners/_banner', 'comprarVivienda') ?>

</main>



<?php get_footer() ?>