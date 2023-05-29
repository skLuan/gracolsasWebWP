<?php
get_template_part('includes/InputClass');

$inputProyecto = new gsInput('proyect_name');
$inputProyecto = new gsInput('proyect_name');
// $apiSend = 'https://api.smart-home.com.co/api/leadForm/';
// $rInput = $inputProyecto->renderInput('Nombre del proyecto');
?>
<section id="gs_FormProject" class="max-w-screen-2xl bg-greenG-mid shadow-lg py-10">
    <h2 class="text-white font-futuraBold text-4xl mt-20 mb-3 text-center col-span-full">Formulario de contacto</h2>
    <form method="POST" class="" action="url_de_tu_api flex flex-col">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('my_form_nonce'); ?>">
        <div class="grid grid-cols-2 max-w-2xl mx-auto">
            <?= $inputProyecto->renderInput('proyect_ref', 'Proyecto*'); ?>
            <?= $inputProyecto->renderInput('proyect_tel', 'Teléfono*'); ?>
            <?= $inputProyecto->renderInput('proyect_customer', 'Nombre*'); ?>
            <?= $inputProyecto->renderInput('proyect_email', 'Correo eléctronico*'); ?>
        </div>
        <div class="flex flex-row w-fit mx-auto mt-5">
            <input type="checkbox" name="gs_policies" id="gsPolicies"> <label class="text-whiteG" for="gsPolicies">
                Acepto la
                <a class="underline font-futuraBold text-orangeG" href="">política de tratamientos personales</a></label>
        </div>
        <input type="submit" class="my-2 mx-auto flex w-fit px-3 py-1 bg-orangeG text-white font-futuraBold" value="Enviar">
        <!-- Agrega aquí el campo de reCAPTCHA si deseas utilizarlo -->

    </form>
</section>