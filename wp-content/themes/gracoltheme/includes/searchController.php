<?php

function gsLoopSearch()
{
    $args = array(
        'post_type'       => 'proyectos',
        'posts_per_page'  => -1,
        'order'           => 'ASC',
        'orderby'         => 'title',
        'tax_query'        => array(
            array(
                'taxonomy' => 'categoria-proyecto',
                'field' => 'slug',
                'terms' => 'obras-entregadas',
                'operator' => 'NOT IN'
            ),
        )
    );
    $ubiData = $_POST['searchUbicacion'];
    $typeData = $_POST['searchType'];

    $urlProyectosVenta = "/categoria-proyectos/en-venta/";

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
            $isMini = filter_var($_POST['isMini'], FILTER_VALIDATE_BOOLEAN);
            // echo var_dump($_POST['isMini']);
            ob_start();
            if (isset($isMini) && $isMini === true) {
                get_template_part('components/cards/_card', 'homeMini');
            } else if (strcmp($_POST['sendUrl'], $urlProyectosVenta) === 0) {
                get_template_part('components/cards/_card', 'enVenta');
            } else {
                get_template_part('components/cards/_card', 'homeProyecto');
            }

            $cardContent = ob_get_clean();

            $return[] = $cardContent;
        }
        wp_reset_postdata();
    }
    wp_send_json($return);
}
add_action("wp_ajax_nopriv_gsLoopSearch", 'gsLoopSearch');
add_action("wp_ajax_gsLoopSearch", 'gsLoopSearch');
