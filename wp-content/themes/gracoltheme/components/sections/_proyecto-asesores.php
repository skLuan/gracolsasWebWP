<?php
$ubicacion = get_post_meta(get_the_ID(), 'gs_ciudad', true);
$ubicacion = remove_accents($ubicacion);
$newsArgs = [
    'post_type' => 'asesores-comerciales',
    'post_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'id',
    'tax_query'     => array(
        array(
            'taxonomy'     => 'asesor-ubicacion',
            'field'   => 'slug',
            'terms' => $ubicacion
        )
    )
];
$asesores = new WP_Query($newsArgs);
?>
<section class="relative w-full mx-auto max-w-screen-2xl">
    <picture>
        <img class="-translate-x-1/4 lg:-translate-x-0 h-800 lazyload lg:h-auto max-w-none lg:max-w-max" data-src="<?= IMAGE . 'asesores/BANNER_CALL_CENTER.jpg' ?>" alt="company team">
    </picture>
    <div class="relative grid grid-cols-1 p-10 pt-0 lg:pt-10 lg:flex lg:flex-row lg:flex-wrap lg:w-full sectionAsesores">
        <h3 class="absolute max-w-2xl px-5 py-2 mx-auto text-4xl text-center -translate-y-6 col-span-full text-whiteG bg-orangeG drop-shadow-md">Estamos listos para atenderte</h3>
        <?php if ($asesores->have_posts()) : ?>
            <?php while ($asesores->have_posts()) :
                $asesores->the_post();
                $number = get_post_meta(get_the_ID(), 'gs_telefono_asesor', true);
                $picture = get_post_meta(get_the_ID(), 'imagen_asesor', true);

                $asesor = [
                    'name' => get_the_title(),
                    'number' => $number,
                    'picture' => $picture
                ];
            ?>
                <?= get_template_part('components/cards/card', 'asesor', ['asesor' => $asesor]) ?>
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</section>