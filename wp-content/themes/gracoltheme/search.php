<?php get_header(); ?>

<main id="main-content" class="search-results">

    <header class="page-header">
        <h1 class="page-title">
            <?php
            /* Muestra el título de los resultados de búsqueda */
            printf(esc_html__('Search Results for: %s', 'text-domain'), '<span>' . get_search_query() . '</span>');
            ?>
        </h1>
    </header>

    <?php if (have_posts()) : ?>
        <section class="search-results-list">
            <?php while (have_posts()) : the_post(); ?>
                <?php /* Aquí puedes personalizar cómo se muestran los resultados de búsqueda individualmente */ ?>
                <article <?php post_class(); ?>>
                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
        </section>

        <?php /* Aquí puedes agregar la paginación si lo deseas */ ?>

    <?php else : ?>
        <p><?php esc_html_e('No results found.', 'text-domain'); ?></p>
    <?php endif; ?>

</main>
<?php get_footer(); ?>