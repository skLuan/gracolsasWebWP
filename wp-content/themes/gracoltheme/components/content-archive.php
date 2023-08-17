
<?php
$urlImage = IMAGE . 'img-post.png';
get_the_post_thumbnail_url() !== null && get_the_post_thumbnail() != ''? $urlImage = get_the_post_thumbnail_url() : '';
?>
<article class="grid grid-cols-1 gap-2 mb-5 post md:grid-cols-2">
    
    <div>
        <a href="<?php the_permalink(); ?>">
            <img src="<?= $urlImage ?>" alt="image" class="lazyload image-blog" >
        </a>
    </div>
    <div class="flex flex-col justify-center col-span-6 col-start-2 mx-3 mb-5 text-left items-left md:mx-5">
        <div class="md:mx-5">
            <a href="<?php the_permalink(); ?>">
                <img data-src="<?= $urlImage ?>" alt="image" class="block lazyload image-blog md:hidden" >
            </a>
            <a href="<?php the_permalink(); ?>">
                <h2 class="text-3xl text-greenG font-futuraBold"><?php the_title(); ?></h2>
            </a>
            <p class="mt-3 mb-2"><?php the_excerpt(); ?></p>
            <p class="py-4"><a class="items-center px-4 pt-2 pb-3 text-lg bg-orangeG text-whiteG font-futuraBold" href="<?php the_permalink(); ?>">Leer más</a></p>
        </div>
    </div>
</article>