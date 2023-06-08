<?php

function gsLoopSearch()
{
    $args = array(
        'post_type'       => 'proyectos',
        'posts_per_page'  => -1,
        'order'           => 'ASC',
        'orderby'         => 'title',
    );
    $ubiData = $_POST['searchUbicacion'];
    $typeData = $_POST['searchType'];

    $return = [];

    if (!isset($_POST['searchUbicacion']) && !isset($_POST['searchType'])) {
        $return['error'] = 'No me enviaron nada compita';
        wp_send_json($return);
        return;
    }

    if ($ubiData != 'all') {
        $args['meta_query'][] =
            array(
                'key'      => 'gs_ciudad', // Reemplaza con el nombre real de la meta key
                'value'    => $ubiData, // Reemplaza con el valor real del tag que recibiste por AJAX
                'compare'  => '==', // Puedes ajustar esto según tus necesidades (por ejemplo, '=','<','>', etc.)
            );
    }
    if ($typeData != 'all') {
        $args['tax_query'][] = array(
            'taxonomy' => 'tag-proyecto', // Reemplaza con el nombre real de la taxonomía
            'field'    => 'slug',
            'terms'    => $_POST['searchType'], // Reemplaza con el valor real del tag que recibiste por AJAX
        );
    }
    $proyectos = new WP_Query($args);
    if ($proyectos->have_posts()) {
        while ($proyectos->have_posts()) {
            $proyectos->the_post();
            ob_start();
            get_template_part('components/cards/_card', 'homeProyecto');
            $cardContent = ob_get_clean();
            
            $return[] = $cardContent;
        }
    }
    wp_send_json($return);
}
add_action("wp_ajax_nopriv_gsLoopSearch", 'gsLoopSearch');
add_action("wp_ajax_gsLoopSearch", 'gsLoopSearch');
