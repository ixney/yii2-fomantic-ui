<?php

namespace ixney\FomanticUI\assets;

use Yii;
use yii\web\AssetBundle;

class JSAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@vendor/fomantic/ui/dist';

    /**
     * @var array
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'ixney\FomanticUI\assets\CSSAsset'
    ];

    public function init()
    {
        $postfix = YII_DEBUG ? '' : '.min';
        $this->js[] = 'semantic' . $postfix . '.js';

        parent::init();
    }
}
