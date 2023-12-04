<?php
$projectos_garantias = ['bosque-encantado', 'palmas-del-llano', 'palmas-del-sol', 'camino-del-bosque'];
$projectos_quejas = ['bosque-encantado', 'palmas-del-llano', 'palmas-del-sol', 'camino-del-bosque'];
$projectos_select;
if (isset($args['proyectos'])) {
    $tempP = $args['proyectos'];
    if ($tempP == 'garantias') {
        $projectos_select = $projectos_garantias;
    } else if ($tempP == 'quejas') {
        $projectos_select = $projectos_quejas;
    }
}
?>
<div class="w-11/12 mx-auto my-3 gs_inputContainer lg:w-fit">
    <label class="text-lg bg-gra text-greenG-mid" for="gs_projects_select">Proyecto</label>
    <br>
    <select name="gs_projects_select" id="gs_projects_select">
        <?php
        if (isset($projectos_select)) :
            foreach ($projectos_select as $project) :
        ?>
                <option value="<?= $project ?>"><?= str_replace('-', ' ', $project) ?></option>
        <?php
            endforeach;
        endif;
        ?>
    </select>
</div>