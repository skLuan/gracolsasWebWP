<?php
global $gsBarrio;

!isset($gsBarrio) ? $gsBarrio = get_post_meta(get_the_ID(), 'gs_barrio', true) : '';
?>
<section id="UbicacionProyecto" class="max-w-screen-2xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-5 shadow-lg">
    <figure class="overflow-hidden lg:col-span-full">
        <picture class="h-fit">
            <img class="max-w-none -translate-x-[38%] lg:-translate-x-0 h-56 lg:h-[unset] lg:max-w-full" src="<?= IMAGE . 'B_UbicacionP.jpg' ?>" alt="">
        </picture>
    </figure>
    <div class="lg:pl-5" id="C_ProjectMap">
        <div class="p-5 lg:p-10">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15943.862883189715!2d-76.66663973610284!3d2.5180999093659158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e301adb641518f3%3A0xf5a91caa29171285!2sCampo%20Bello%2C%20Popay%C3%A1n%2C%20Cauca!5e0!3m2!1sen!2sco!4v1685381663702!5m2!1sen!2sco" class="w-full h-80 lg:w-[600px] lg:h-[450px]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <article class="px-5 lg:px-20 flex flex-col justify-center items-center">
        <h3 class="font-futuraBold text-4xl text-center my-3 text-greenG drop-shadow"><?= $gsBarrio ?></h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris. Maecenas vitae mattis tellus. Nullam quis imperdiet augue. Vestibulum auctor ornare leo, non suscipit magna interdum eu. Curabitur pellentesque nibh nibh, at maximus ante.
        </p>
        <div class="w-full flex flex-row justify-around mt-5 mb-10 lg:my-5">
            <a class="font-futuraBold underline" href="">Ir con Google maps</a>
            <a class="font-futuraBold underline" href="">Ir con Waze</a>
        </div>
    </article>
</section>