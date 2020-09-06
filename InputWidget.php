<?php

namespace icms\FomanticUI;

use icms\FomanticUI\assets\JSAsset;

class InputWidget extends \yii\widgets\InputWidget
{
    /**
     * @var array
     */
    public $options = [];

    /**
     * @var array
     */
    public $clientOptions = [];

    public function init()
    {
        parent::init();
        isset($this->options['id'])
            ? $this->setId($this->options['id'])
            : $this->options['id'] = $this->getId();
    }

    public function registerJsAsset()
    {
        JSAsset::register($this->getView());
    }
}
