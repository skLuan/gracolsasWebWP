<?php
$newsArgs = [
    'post_type' => 'post',
    'post_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'id',
];
$loopNews = new WP_Query($newsArgs);
?>
<section class="relative mb-10 overflow-auto md:max-w-screen-2xl md:mx-auto">
    <!-- <div class="w-full mb-5 text-center bg-center bg-no-repeat bg-cover" style="background-image: url('<?= IMAGE . 'ultimas-noticias.png' ?>'); height: 170px">
    </div> -->
    <div class="flex items-center justify-center w-full mb-5 overflow-hidden text-center bg-center bg-no-repeat bg-cover">
        <picture>
            <img class="h-24 lg:h-[unset] max-w-none" src="<?= IMAGE . 'ultimas-noticias.png' ?>" alt="news banner">
        </picture>
    </div>
    <div class="relative flex w-full gap-6 px-5 pb-5 overflow-x-auto md:grid md:grid-cols-3 md:gap-x-5 lg:px-0 lg:pb-0 md:gap-y-8 md:w-4/5 md:mx-auto snap-x">
        <?php if ($loopNews->have_posts()) : ?>
            <?php while ($loopNews->have_posts()) :
                $loopNews->the_post();
            ?>
                <?= get_template_part('components/cards/_card', 'news') ?>
        <?php endwhile;
            wp_reset_postdata();
        endif; ?>


    </div>
</section>