<?php

class gsInput
{
    private $nameId;
    private $type;

    public function __construct($value = null, $type = 'text')
    {
        $this->nameId = $value;
        $this->type = $type;
    }

    public function renderInput($nameId = 'newInput[]', $labelName = 'L_name', $type = 'text')
    {

        ob_start();
?>
        <div class="gs_inputContainer w-fit mx-auto">
            <label for="<?= $nameId ?>"><?= $labelName ?></label>
            <br>
            <input type="<?= $type ?>" name="<?= $nameId ?>" id="<?= $nameId ?>" required>
        </div>
<?php
        return ob_get_clean();
    }
}
