<?php get_header();

// Definir los tipos de post que deseas incluir en la búsqueda
$post_types = array('proyectos', 'avance-obra', 'obras-entregadas', 'post');

function typeofSearch($postType): String{
    $result = match ($postType) {
        'proyectos' => 'Proyectos',
        'avance-obra' => 'Avances de obra',
        'obras-entregadas' => 'Obras entregadas',
        'post' => 'Blog post',
    };
    return $result;
}

// Crear arreglos vacíos para cada tipo de post
$results_by_type = array();
foreach ($post_types as $post_type) {
    $results_by_type[$post_type] = array();
}
// Recorrer los resultados de búsqueda
if ($wp_query->have_posts()) {
    while ($wp_query->have_posts()) {
        $wp_query->the_post();

        // Obtener el tipo de post actual
        $current_post_type = get_post_type();
        if (has_term('obras-entregadas', 'categoria-proyecto', get_the_ID())) {
            // Agregar el post al arreglo correspondiente según el tipo de post
            $results_by_type['obras-entregadas'][] = $post;
        } elseif (in_array($current_post_type, $post_types)) {
            // Verificar si el tipo de post está incluido en los tipos de post que deseas mostrar
            $results_by_type[$current_post_type][] = $post;
        }
    }
}
wp_reset_postdata();
wp_reset_query();

?>


<main id="main-content" class="w-full lg:mt-24 search-results">
    <section class="mx-auto bg-white max-w-screen-2xl search-results-list">
        <div class="pt-11 lg:pt-4 max-w-screen-2xl">
            <?= get_template_part('components/_search', 'onlyText') ?>
            <h1 class="py-5 text-lg text-center page-title text-greenG">
                <?php
                /* Muestra el título de los resultados de búsqueda */
                printf(esc_html__('Resultados para: %s', 'text-domain'), '<span class="text-xl font-futuraBold">' . get_search_query() . '</span>');
                ?>
            </h1>
        </div>
        <?php if (have_posts()) : ?>
            <article class="grid grid-cols-1 px-5 pt-5 lg:pb-10 sm:w-full md:grid-cols-3 gap-x-5 gap-y-8 md:w-4/5 md:mx-auto">
                <?php
                // Mostrar los resultados organizados por tipo de post
                foreach ($results_by_type as $post_type => $results) :
                    if (count($results) > 0) :
                ?>
                        <h2 class="text-2xl col-span-full font-futuraBold text-orangeG"><?= typeofSearch($post_type) ?></h2>
                <?php
                    endif;
                    // Recorrer los resultados del tipo de post actual
                    foreach ($results as $result) {
                        global $post;
                        $post = $result;
                        setup_postdata($result);
                        switch ($post_type):
                            case 'proyectos':
                                get_template_part('components/cards/_card', 'homeMini', ['idP' => $result->ID]);
                                break;
                            case 'obras-entregadas':
                                get_template_part('components/cards/_card', 'simple', ['idP' => $result->ID]);
                                break;
                            case 'avance-obra':
                                get_template_part('components/cards/_card', 'simple', ['idP' => $result->ID]);
                                break;
                            case 'post':
                                get_template_part('components/cards/_card', 'news', ['idP' => $result->ID]);
                                break;
                        endswitch;
                    }
                    wp_reset_postdata();
                    wp_reset_query();
                endforeach;
                // Restaurar los datos originales del post
                ?>
            </article>

            <?php /* Aquí puedes agregar la paginación si lo deseas */ ?>

        <?php else : ?>
            <p><?php esc_html_e('No results found.', 'text-domain'); ?></p>
        <?php endif; ?>
    </section>

</main>
<?php get_footer(); ?>