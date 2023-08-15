<?php get_header() ?>



<main class="w-full lg:mt-16">
    <section class="w-full bg-white">
        <figure class="relative h-48 overflow-hidden lg:h-auto">
            <picture class="">
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'bannerblog.jpg' ?>">
                <img class="h-full max-w-none lg:max-w-full" src="<?= IMAGE . 'bannerblog.jpg' ?>" alt="">
            </picture>
        </figure>
    </section>
    <section class="grid grid-cols-1 mt-5 mb-5 bg-white sm:w-full md:grid-cols-1 md:w-4/5 md:mx-auto">
        <?php if (have_posts()) {
            while (have_posts()) {
                the_post();
                //the_content();
                get_template_part('components/content', 'archive');
            }
        }
        ?>
    </section>

</main>

<?php get_footer() ?>