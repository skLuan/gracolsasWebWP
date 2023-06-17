<?php get_header() ?>
<main class="w-full lg:mt-24">
    <section class="w-full lg:pt-10 bg-white">
        <figure class="relative">
            <picture>
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'baner_servicioCliente.png' ?>">
                <img src="<?= IMAGE . 'baner_servicioCliente.png' ?>" alt="">
            </picture>
            <div class="absolute top-0 left-0 w-full h-full max-w-screen-2xl grid grid-cols-12 gap-5">
                <div class="col-start-2 col-span-6 text-center flex flex-col justify-center items-center mb-5">
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
    <section class="max-w-screen-2xl mx-auto text-center mt-4">
        <a href="" class="bg-orangeG text-white mt-5 font-futuraBold py-1 px-5 rounded">Acceder a la plataforma</a>
    </section>
    <section id="options" class="max-w-screen-2xl grid grid-cols-2 grid-rows-2 mx-auto px-5 mb-5 mt-5">

        <div id="pagos" class="pagos w-full">
            <div class="flex flex-wrap justify-around w-full bg-cover bg-center text-center p-3" style="background-color: #dde3e7; background-image: url('<?= IMAGE . 'pagos.jpg' ?>');background-position-x: -100px; height: 312px; ">
                <div class="flex-auto"></div>
                <div class="flex-auto"></div>
                <div class="flex items-center flex-auto">
                     <div>
                         <h2 class="text-orangeG text-6xl font-futuraBold">Pagos</h2>
                         <h3 class="text-2xl font-futuraBold text-grayG">por proyectos</h3>
                     </div>
                </div>
                
            </div>
        </div>

        <div id="quejaReclamo" class="queja w-full">
            <div class="flex justify-around w-full">
                <img src="<?= IMAGE . 'queja.png' ?>" alt="queja" width="300px">
                <div class="flex items-center">
                    <div class="p-4">
                        <h2 class="text-orangeG text-3xl font-futuraBold text-center">¿Alguna queja o reclamo?</h2>
                        <p class="text-1xl font-futuraBold text-grayG text-center">Si tienes alguna queja o reclamo de nuestro servicio dale clic al botón para redireccionarte al formulario de quejas o reclamos.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="Encuentra" class="w-full">
            <div class="grid grid-cols-2 justify-around w-full bg-cover bg-center text-center p-3" style="background-image: url('<?= IMAGE . 'ayudas.png' ?>'); height: 312px; ">
                <div class="flex items-center flex-auto">
                     <div class="p-4">
                         <h2 class="text-greenG text-3xl font-futuraBold text-center">¿No has encontrado lo que buscas?</h2>
                         <p class="text-1xl font-futuraBold text-grayG text-center">Encuentra lo que buscas en nuestra sección de ayudas</p>
                     </div>
                </div>
                <div class="flex-auto"></div>
            </div>
        </div>
        <div id="Garantias">
            <div class="flex justify-end w-full">
                <div class="flex items-center">
                        <div class="p-10">
                            <h2 class="text-greenG text-3xl font-futuraBold text-center">Garantías</h2>
                            <p class="text-1xl font-futuraBold text-grayG text-justify">Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.</p>
                            <a class="float-right text-orangeG font-futuraBold underline underline-offset-1" href="#" class="btn">Saber más</a>
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