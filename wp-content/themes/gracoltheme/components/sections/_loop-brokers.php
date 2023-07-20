<?php
$args = array(
    'post_type' => 'proyectos',
    'posts_per_page' => -1, // Obtener todos los posts
    'tax_query' => array(
        array(
            'taxonomy' => 'tag-proyecto',
            'field'    => 'slug',
            'terms'    => 'brokers',
            'include_children' => true, // Excluir los hijos del tag padre
        ),
    ),
);

$query = new WP_Query($args);
$brokers = [];
$projects = [];
$brokers_id = [];
$parent_broker_id = 71;

if ($query->have_posts()) {
    $tag_posts = array();

    while ($query->have_posts()) {
        $query->the_post();

        // Obtener los metadatos y el nombre del post
        $post_id = get_the_ID();
        $logoUrl = get_post_meta($post_id, 'project_logo', true);
        $project_title = get_the_title();
        $broker = get_the_terms(get_the_ID(), 'tag-proyecto');
        $projectInfo = [
            'name' => $project_title,
            'logoUrl' => $logoUrl
        ];
        foreach ($broker as $term) {
            if ($term->parent == $parent_broker_id) {
                $broker_name = $term->name; // Obtener el nombre del término padre
                $broker_id = $term->term_id; // Obtener el ID del término padre
                $brokers[$broker_name][] = $projectInfo;
                $brokers_id[$broker_name] = $broker_id;
                // Realizar acciones con el nombre o ID del término padre
                // ...
                break; // Salir del bucle foreach después de encontrar el término padre
            }
        }
    }
}
wp_reset_postdata();

// Obtener la descripción de cada tag
$brokersUrls = array();
if (count($brokers) > 0) {
    foreach ($brokers_id as $bName => $bId) {
        $temB = get_term_by('id', $bId, 'tag-proyecto');
        isset($temB) ? $brokersUrls[$bName] = $temB->description : $brokersUrls[$bName] = '';
    }
}
?>
<div id="container_pagos" class="grid w-full grid-cols-1 p-5 bg-whiteG lg:grid-cols-3">
    <?php
    if (count($brokers) > 0) :
        foreach ($brokers as $broker => $projectInfo) :
    ?>
            <div class="w-full p-4 text-center">
                <a href="<?= $brokersUrls[$broker] ?>" class="block px-5 py-1 mt-5 text-base leading-tight text-center bg-transparent border-2 rounded text-orangeG border-orangeG font-futuraBold"><?= $broker ?></a>
                <?php
                // echo var_dump($projectInfo);
                foreach ($projectInfo as $project) : ?>
                    <div class="flex flex-wrap justify-center w-full">
                        <a href="<?= $brokersUrls[$broker] ?>" class="flex flex-wrap items-center justify-center p-3 py-5 mt-5 bg-white rounded">
                            <img class="w-2/3 lazyload" data-src="<?= $project['logoUrl'] ?>" alt="logo-proyecto">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>