<?php
$title = get_the_title();
$permalink = get_permalink( get_the_ID() );
$content = get_the_excerpt();

$content = substr($content, 0, 50) . '...';

$urlImage = IMAGE . 'img-post.png';
?>
<div class="bg-white rounded-sm shadow-lg snap-center shrink-0">
    <div class="w-64 shrink-0 md:w-full">
        <div class="bg-center bg-cover" style="background-image: url('<?= $urlImage ?>'); height: 170px"></div>
        <article class="p-3 text-greenG-mid">
            <h3 class="text-2xl font-futuraBold text-orangeG"><a href="<?= $permalink ?>">
                    <?= $title ?>
                </a></h3>
            <p>
                <?= $content ?>
            </p>
            <div class="w-full text-right">
                <p class="text-lg text-orangeG font-futuraBold">Ver más</p>
            </div>
        </article>
    </div>
</div>