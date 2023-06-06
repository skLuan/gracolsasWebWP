<?php

$inputProyecto = new gsInput('proyect_name');
// $apiSend = 'https://api.smart-home.com.co/api/leadForm/';
// $rInput = $inputProyecto->renderInput('Nombre del proyecto');
?>
<section id="gs_FormProject" class="max-w-screen-2xl bg-greenG shadow-lg mx-auto py-32">
    <form method="POST" class="bg-whiteG lg:w-1/2 mx-5 relative p-5 pb-0 rounded-lg lg:mx-auto shadow-lg" action="url_de_tu_api">
        <h2 class="text-greenG font-futuraBold text-4xl mt-5 mb-10 text-center col-span-full">Formulario de contacto</h2>
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('my_form_nonce'); ?>">
        <div class="grid grid-cols-1 lg:grid-cols-2 max-w-2xl mx-auto">
            <?= $inputProyecto->renderInput('project_ref', 'Proyecto*'); ?>
            <?= $inputProyecto->renderInput('project_tel', 'Teléfono*'); ?>
            <?= $inputProyecto->renderInput('project_customer', 'Nombre*'); ?>
            <?= $inputProyecto->renderInput('project_email', 'Correo eléctronico*'); ?>
        </div>
        <div class="flex flex-row w-fit mx-5 lg:mx-auto mt-5">
            <input type="checkbox" name="gs_policies" id="gsPolicies"> <label class="text-greenG-mid ml-3 w-fit" for="gsPolicies">
                Acepto la
                <a class="underline font-futuraBold text-orangeG" href="">política de tratamientos personales</a></label>
        </div>
        <input type="submit" class="my-2 rounded mx-auto flex w-fit px-10 relative -bottom-4 py-2 bg-orangeG text-white font-futuraBold" value="Enviar">
        <!-- Agrega aquí el campo de reCAPTCHA si deseas utilizarlo -->
    </form>
</section>