<?php get_header();
$fechas = [2003, 2008, 2009, 2010, 2012, 2015, 2019, 2023];
$args = [
    'fechas' => $fechas,
    'title' => 'Historia',
];
$textos = [
    2003 => 'El mayor accionista de GRACOL S.A.S, inicia su participación en el sector de la construcción en el
año 2.003, como inversionista en proyectos de construcción, asociado con arquitectos e ingenieros
de la ciudad de Popayán. El primer proyecto en ejecutarse, lo constituyen cuatro inmuebles para
vivienda en el barrio Los Hoyos (Popayán); continuando posteriormente con la construcción de
varios proyectos de edificios para uso residencial. Dentro de los proyectos destacados en esta
forma de asociación se destaca la Clínica Odontológica.',
    2008 => 'Se inicia una nueva etapa en la estructura de inversión en el sector de la
construcción, ejecutando directamente la construcción del Hostal Cristal Plaza en la Ciudad de
Popayán, este proyecto da impulso a los inversores a continuar en la construcción',
    2009 => 'Cámara y Comercio la empresa constructora GRANDES Y MODERNAS CONSTRUCCIONES DE COLOMBIA
S.A.S. GRACOL. GRANDES Y MODERNAS CONSTRUCCIONES DE COLOMBIA S.A.S. GRACOL., inicia
actividades com personeria juridica',
    2010 => 'Con el Proyecto Condominio SANTORINI, conformado por 29 apartamentos y 12
locales comerciales, con un área de 5.546 m2 construidos; el cual ha sido un proyecto altamente
exitoso desde el punto de vista de calidad, comercial y económico el cual ha permitido que
GRACOL S.A.S siga una línea ascendente. Seguidamente, La constructora desarrolla el proyecto
residencial Torres de Cattania constituido por apartamentos, aparta estudios y pent-house; un
proyecto innovador para la ciudad de Popayán, con sus zonas comunes y de esparcimiento, el cual
alcanza un área aproximada de 17.000 m2, construidos.',
    2012 => 'Se realiza la ejecución de proyectos Torres de Cattania en el sector de prados del norte',
    2015 => 'Se realiza la ejecución de proyectos Condomino Venezia, Condomino Santirini, D´pietro y nos enfoquecamos en el mercado Vis en la ciudad de popayan con el proyecto Torres de Milano y demas.',
    2019 => 'Con la ciudadela las Palmas en la ciudad de jamundí constructora Gracol inicia hacer presencia en ciudades intermedias en el sur occidente colombiano.',
    2023 => 'En el mercado de estado unidados, La constructora Gracol presencia en el exterior con unas unidades de vivienda el estado de la Florida.',

];
?>
<main class="w-full lg:mt-16">
    <section class="px-5 mx-auto bg-white shadow-lg max-w-screen-2xl">
        <h2 class="py-5 text-4xl text-center text-orangeG font-futuraBold col-span-full">Gracol hoy</h2>
        <article class="mx-auto mb-5 lg:w-1/2">
            <p>
                Hoy en día, en GRANDES Y MODERNAS CONSTRUCCIONES DE COLOMBIA S.A.S. GRACOL enfoca sus esfuerzos en la construcción de obras civiles destinadas a vivienda y comercio de alta calidad que logran satisfacer las expectativas de
                nuestros clientes y que permitan a los colombianos acceder a vivienda propia. Entre ellos encontramos: Viviendas de estratos Altos, medio-alto, medio y Bajo, Viviendas de Interés Social
                (Vis) y todo tipo de Obras civiles.
            </p>
        </article>
        <article class="flex flex-col justify-between py-12 mx-auto lg:flex-row md:w-2/3">
            <div class="md:w-1/2">
                <h2 class="text-2xl text-center text-orangeG font-futuraBold">Misión</h2>
                <p>
                    Empresa Líder de Popayán en el sector de la construcción con presencia a nivel nacional,
                    destacada por su cumplimiento y enfocada a contribuir con el sueño de las Familias
                    colombianas en tener vivienda propia de alta calidad.
                </p>
            </div>
            <div class="mt-5 md:mt-0 md:w-1/2">
                <h2 class="text-2xl text-center text-orangeG font-futuraBold">Visión</h2>
                <p>
                    Para el 2027 ser reconocida a nivel nacional en construcción de vivienda, con presencia
                    de proyectos como mínimo en 5 regiones y caracterizándose por ser una de las empresas
                    con altos niveles en clima organizacional, con un equipo apasionado por lo que hace y

                    enfocado a posicionar a la compañía por encima del promedio de la Industria en sus
                    niveles de rentabilidad, calidad de sus productos y servicios.
                </p>
            </div>
        </article>
    </section>
    <?= get_template_part('components/sections/_loop', 'lineatiempo', $args) ?>
    <section class="relative bg-white shadow-lg lg:mx-auto lg:px-5 max-w-screen-2xl lg:mt-5">
        <?php
        foreach ($fechas as $i => $fecha) :
            $texto = $textos[$fecha];
            get_template_part(
                'components/sections/_contenido',
                'lineatiempo',
                [
                    'idP' => $fecha,
                    'imagen' => IMAGE . 'img-lineatiempo.png',
                    'texto' => $texto,
                ]
            );
        endforeach;
        ?>
    </section>
</main>
<?php get_footer() ?>