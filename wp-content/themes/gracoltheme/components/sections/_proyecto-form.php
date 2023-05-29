<?php
require GSINCLUDE . 'InputClass.php';

$inputProyecto = new gsInput('proyect_name');
$inputProyecto = new gsInput('proyect_name');

// $rInput = $inputProyecto->renderInput('Nombre del proyecto');
?>
<section id="gs_FormProject" class="max-w-screen-2xl bg-greenG-mid shadow-lg">
    <h2 class="text-white font-futuraBold text-4xl mt-20 mb-3 text-center col-span-full">Formulario de contacto</h2>
    <form method="POST" action="url_de_tu_api">
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('my_form_nonce'); ?>">
        <div class="grid grid-cols-2 max-w-2xl mx-auto">
            <?= $inputProyecto->renderInput('proyect_ref' ,'Proyecto*'); ?>
            <?= $inputProyecto->renderInput('proyect_ref' ,'Teléfono*'); ?>
            <?= $inputProyecto->renderInput('proyect_ref' ,'Nombre*'); ?>
            <?= $inputProyecto->renderInput('proyect_ref' ,'Correo eléctronico*'); ?>
        </div>

        <!-- Agrega aquí el campo de reCAPTCHA si deseas utilizarlo -->

        <input type="submit" value="Enviar">
    </form>
</section>