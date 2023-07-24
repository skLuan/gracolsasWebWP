<?php get_header() ?>



<main class="w-full lg:mt-24">
    <section class="w-full bg-white">
        <figure class="relative">
            <picture>
                <source media="(max-width: 500px)" srcset="<?= IMAGE . 'banerblog.png' ?>">
                <img src="<?= IMAGE . 'banerblog.png' ?>" alt="">
            </picture>
            <div class="absolute top-0 left-0 grid w-full h-full grid-cols-12 gap-5 max-w-screen-2xl">
                <div class="flex items-end justify-start col-span-6 col-start-2">
                    <h2 class="p-4 text-2xl md:text-6xl lg:text-6xl font-futuraBold text-whiteG text-shadow">Blog</h2>
                </div>
            </div>
        </figure>
    </section>
    <section class="grid grid-cols-1 mt-5 mb-5 bg-white sm:w-full md:grid-cols-1 md:w-4/5 md:mx-auto">
        <?php if(have_posts()) { 
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