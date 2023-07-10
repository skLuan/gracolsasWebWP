<?php get_header() ?>



<main class="w-full lg:mt-24">
    <section class="w-full bg-white">
        <figure class="relative">
            <picture>
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'banerblog.png' ?>">
                <img src="<?= IMAGE . 'banerblog.png' ?>" alt="">
            </picture>
            <div class="absolute top-0 left-0 w-full h-full max-w-screen-2xl grid grid-cols-12 gap-5">
                <div class="col-start-2 col-span-6 flex justify-start items-end">
                    <h2 class="text-2xl md:text-6xl lg:text-6xl font-futuraBold p-4 text-whiteG text-shadow">Blog</h2>
                </div>
            </div>
        </figure>
    </section>
    <section class="sm:w-full grid grid-cols-1 md:grid-cols-1 md:w-4/5 md:mx-auto mt-5 mb-5 bg-white">
        <?php if(have_posts()) { 
            while (have_posts()) {
                the_post();
                //the_content();
                get_template_part('template-parts/content', 'archive');
            }
        }
        ?>
    </section>
    
</main>

<?php get_footer() ?>