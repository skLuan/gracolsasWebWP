<?php
$inputProyecto = new gsInput('proyect_name');
//------------------ SenderController ------------------
$formController = new FormProjectController();

$formController->setSMID(get_the_ID());
$formController->setName(get_the_ID());
echo $formController->projectKey;
?>
<section id="gs_FormProject" class="py-32 mx-auto shadow-lg max-w-screen-2xl bg-greenG">
    <form id="gs_form_project_to_sm" method="POST" class="relative p-5 pb-0 mx-5 rounded-lg shadow-lg bg-whiteG lg:w-1/2 lg:mx-auto">
        <h2 class="mt-5 mb-10 text-4xl text-center text-greenG font-futuraBold col-span-full">Formulario de contacto</h2>
        <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('my_form_nonce'); ?>">
        <div class="grid max-w-2xl grid-cols-1 mx-auto lg:grid-cols-2">
            <?= $inputProyecto->renderInput('project_ref', 'Proyecto*', 'text', $formController->projectName, true); ?>
            <?= $inputProyecto->renderInput('project_tel', 'Teléfono*'); ?>
            <?= $inputProyecto->renderInput('project_customer', 'Nombre*'); ?>
            <?= $inputProyecto->renderInput('project_email', 'Correo eléctronico*'); ?>
        </div>
        <div class="flex flex-row mx-5 mt-5 w-fit lg:mx-auto">
            <input type="checkbox" name="gs_policies" id="gsPolicies"> <label class="ml-3 text-greenG-mid w-fit" for="gsPolicies">
                Acepto la
                <a class="underline font-futuraBold text-orangeG" href="">política de tratamientos personales</a></label>
        </div>
        <input type="submit" class="relative flex px-10 py-2 mx-auto my-2 text-white rounded cursor-pointer w-fit -bottom-4 bg-orangeG font-futuraBold" value="Enviar">
        <!-- Agrega aquí el campo de reCAPTCHA si deseas utilizarlo -->
    </form>
</section>