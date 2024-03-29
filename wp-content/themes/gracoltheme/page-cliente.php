<?php get_header();
// Obtener el slug de la categoría deseada
$category_slug = 'manual-de-usuario';

// Obtener el objeto de la categoría por el slug
$category = get_category_by_slug($category_slug);
$archive_url = get_category_link($category->term_id);
?>
<main class="w-full lg:mt-16">
    <section class="w-full mt-10 bg-white lg:mt-0 lg:pt-10">
        <figure class="relative overflow-hidden h-[450px] lg:h-[unset] bg-white">
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
    <section id="options" class="grid grid-cols-1 mx-auto lg:grid-cols-2 lg:grid-rows-none max-w-screen-2xl">

        <div id="pagos" class="grid w-full h-fit pagos justify-items-center">
            <div class="relative flex flex-wrap justify-around w-full h-56 overflow-hidden text-center md:h-80">
                <picture class="absolute z-0 w-full h-full -left-10 md:-left-0">
                    <img class="h-full md:w-full md:h-auto lazyload max-w-none" data-src="<?= IMAGE . 'pagos.jpg' ?>" alt="">
                </picture>
                <div class="z-10 flex flex-col items-center w-2/3 ml-auto">
                    <div class="mx-auto mt-auto">
                        <h2 class="text-3xl md:text-5xl text-orangeG font-futuraBold">Portal de pagos</h2>
                        <h3 class="md:text-2xl md:pt-3 font-futuraBold text-grayG">Paga tus cuotas fácil, rápido y seguro</h3>
                    </div>
                    <button id="btn_pagos" class="px-5 py-1 mt-auto mb-10 text-orangeG border-[3px] border-orangeG rounded bg-transparent font-futuraBold">Realizar pago</button>
                </div>

            </div>
            <?= get_template_part('components/sections/_loop', 'brokers') ?>
        </div>

        <div id="quejaReclamo" class="grid w-full bg-[#E4E4E4] justify-items-center">
            <div class="relative bg-[#B3B3B3] grid w-full h-80 md:flex md:justify-around justify-items-center">
                <figure class="absolute z-0 w-full h-full overflow-hidden -right-0 md:-right-28 lg:-right-0">
                    <img src="<?= IMAGE . 'queja.jpg' ?>" alt="queja" class="h-2/3 md:h-full max-w-none">
                </figure>
                <div class="z-10 bg-[#B3B3B3] md:bg-transparent bg-opacity-40 flex flex-col items-center ml-5 md:ml-10 mr-auto md:w-1/2">
                    <div class="p-4 mt-auto">
                        <h2 class="mb-10 text-3xl text-white lg:mb-5 font-futuraBold"> Sugerencias y peticiones</h2>
                        <p class="text-white text-1xl font-futuraBold">Si tiene alguna solicitud, nuestro equipo de asesores esta siempre dispuesto ha ayudarte.</p>
                    </div>
                    <button id="btn_quejas" class="px-5 py-1 mb-10 bg-white bg-opacity-80 mt-auto text-orangeG border-[3px] border-orangeG rounded bg-transparent font-futuraBold">Radicar solicitud
                    </button>
                </div>
            </div>
            <div id="form_quejasreclamos_container" class="w-full hidden transition-all">
                <?= get_template_part('components/_form', 'queja') ?>
            </div>
        </div>
        <div id="Garantias">
            <div class="relative grid w-full overflow-hidden md:bg-greenG h-80 lg:h-80 md:flex md:justify-around justify-items-center">
                <picture class="absolute z-0 h-full -right-32 md:-right-0">
                    <img src="<?= IMAGE . 'garantia.jpg' ?>" alt="queja" class="h-full md:w-full lg:h-auto max-w-none">
                </picture>
                <div class="z-10 flex items-center mr-auto md:w-3/5">
                    <div class="flex flex-col p-5 md:p-10">
                        <h2 class="mb-5 text-3xl text-white lg:text-center font-futuraBold">Garantías y postventa</h2>
                        <p class="mb-5 text-white lg:text-center text-1xl font-futuraBold">Si tiene algún inconveniente en su inmueble, nuestro equipo de asesores esta siempre dispuesto ha ayudarte.</p>
                        <a id="url_garantia" target="_blank" href="https://manage.smart-home.com.co/CustomerExperiences/LoginCustomerExperince.html?action=login&companyCode=50c04f3c&companyColor=F25922" class="px-5 mx-auto bg-greenG bg-opacity-70 text-center py-1 text-orangeG border-[3px] border-orangeG rounded font-futuraBold">Radicar solicitud</a>
                        <!-- <button id="btn_garantia" class="px-5 mx-auto bg-greenG bg-opacity-70 text-center py-1 text-orangeG border-[3px] border-orangeG rounded font-futuraBold">Radicar solicitud</button> -->
                    </div>
                </div>
            </div>
            <div id="form_postventa_container" class="bg-[#E4E4E4] hidden">
                <?= get_template_part('components/_form', 'postventa') ?>
            </div>
        </div>
        <div id="Encuentra" class="w-full">
            <div class="grid justify-around w-full grid-cols-1 px-5 py-3 text-center bg-center bg-cover h-80 md:grid-cols-2" style="background-image: url('<?= IMAGE . 'ayudas.png' ?>');">
                <div class="flex items-center flex-auto w-3/5 md:w-auto">
                    <div class="p-0 md:p-4">
                        <h2 class="mb-5 text-3xl text-center text-greenG font-futuraBold">Manual de usuario de proyectos</h2>
                        <p class="text-center text-1xl font-futuraBold text-grayG">Usos y recomendaciones en el inmueble adquirido.</p>
                        <a href="<?= $archive_url ?>" class="py-1 mt-5 text-greenG border-[3px] block border-greenG rounded bg-transparent font-futuraBold">Ver manuales</a>
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