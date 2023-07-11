
<article class="post grid grid-cols-1 md:grid-cols-2 gap-2 mb-5">
    
    <div><img src="<?php the_post_thumbnail_url(); ?>" alt="image" class="image-blog" ></div>
    <div class="col-start-2 col-span-6 text-left flex flex-col justify-center items-left mb-5 mx-3 md:mx-5">
        <div class="md:mx-5">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="image" class="image-blog block md:hidden" >
            <h2 class="text-greenG text-3xl font-futuraBold"><?php the_title(); ?></h2>
            <p class="mt-3 mb-2"><?php the_excerpt(); ?></p>
            <p class="py-4"><a class="bg-orangeG text-whiteG text-lg items-center pb-3 pt-2 px-4 font-futuraBold" href="<?php the_permalink(); ?>">Leer más</a></p>
        </div>
    </div>
</article>