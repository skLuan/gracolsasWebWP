<?php get_header();
// Obtener el ID del proyecto actual
$proyecto_id = get_the_ID();

// Verificar si el proyecto tiene la taxonomía 'nombre-de-la-taxonomia' asignada



?>
<main class="lg:mt-24">
    <?php
    if (!has_term('obras-entregadas', 'categoria-proyecto', $proyecto_id)):
        get_template_part('components/sections/_proyecto', 'enVentaFull');
    else:
        get_template_part('components/sections/_proyecto', 'obraEntregada');
    endif;
    ?>
</main>
<?php get_footer() ?>