<?php
$faqArgs = [
    'post_type' => 'faq',
    'post_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'id',
];
$faqs = new WP_Query($faqArgs);
?>
<section class="w-full pt-10 pb-5 bg-white">
    <div class="grid mb-5 mt-16 text-center justify-items-center">
        <picture>
            <img class="mb-1 lazyload" src="low-quality.jpg" data-src="<?= IMAGE . 'pregunta.png' ?>" alt="Preguntas Frecuentes" />
        </picture>
        <h2 class="mt-3 text-2xl text-yellowG font-futuraBold">Preguntas Frecuentes</h2>
    </div>

    <div class="grid grid-cols-1 mx-5 mb-5 lg:mx-auto lg:w-4/5 md:grid-cols-2 gap-x-5 gap-y-8">

        <?php if ($faqs->have_posts()) : ?>
            <?php while ($faqs->have_posts()) :
                $faqs->the_post();
            ?>
                <div class="w-3/4 m-auto">
                    <button class="accordion text-greenG font-futuraBold"><span class="pb-1 text-lg"><?= the_title() ?></span></button>
                    <div class="justify-center m-2 text-base lg:px-12 panel text-greenG">
                        <?= the_content() ?>
                    </div>
                </div>
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>
</section>