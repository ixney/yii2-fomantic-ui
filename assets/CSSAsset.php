<?php

namespace icms\FomanticUI\assets;

use Yii;
use yii\web\AssetBundle;

class CSSAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@fomantic/ui/dist';

    public function init()
    {
        $postfix = YII_DEBUG ? '' : '.min';
        $this->css[] = 'semantic' . $postfix . '.css';

        parent::init();
    }
}
