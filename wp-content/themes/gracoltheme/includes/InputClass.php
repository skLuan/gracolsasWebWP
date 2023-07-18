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

    public function renderInput($nameId = 'newInput[]', $labelName = 'L_name', $type = 'text', $value = '', bool $isDisabled = false, $placeholder = '')
    {   
        $class = '';
        if($isDisabled) $class = 'bg-gray-200';
        ob_start();
?>
        <div class="w-11/12 mx-auto my-3 gs_inputContainer lg:w-fit">
            <label class="text-lg bg-gra text-greenG-mid" for="<?= $nameId ?>"><?= $labelName ?></label>
            <br>
            <input class="<?= $class ?> rounded w-full lg:w-[unset] border-2 border-greenG border-opacity-10 py-1 px-3 font-futuraBold text-greenG" placeholder="<?= $placeholder ?>" type="<?= $type ?>" name="<?= $nameId ?>" id="<?= $nameId ?>" required <?php if ($isDisabled) : ?> disabled <?php endif; ?> <?php if ($value != '') : ?> value="<?= $value ?>" <?php endif; ?>>
        </div>
<?php
        return ob_get_clean();
    }
}
