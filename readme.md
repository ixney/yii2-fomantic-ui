# Yii2 Fomantic UI extension

[Fomantic UI](http://fomantic-ui.com) extension for [Yii2](http://www.yiiframework.com)

## Installation

yii2-fomantic-ui 2.* works with Fomantic UI 2.*

### Composer

The preferred way to install this extension is through [Composer](http://getcomposer.org/).

Either run

```
php composer.phar require icms/yii2-fomantic-ui "~2"
```

or add

```
"icms/yii2-fomantic-ui": "~2"
```

to the require section of your ```composer.json```

## Usage

Add SemanticUICSSAsset to AppAsset:

```php
<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'Zelenin\yii\SemanticUI\assets\SemanticUICSSAsset'
    ];
}
```

Use Semantic UI widgets and elements. Standard Yii2 widgets also adopted.

You may replace yii2 standard widgets. Write in bootstrap.php:

```php
Yii::$container->set(\yii\grid\GridView::className(), \Zelenin\yii\SemanticUI\widgets\GridView::className());
Yii::$container->set(\yii\widgets\ActiveForm::className(), \Zelenin\yii\SemanticUI\widgets\ActiveForm::className());
Yii::$container->set(\yii\bootstrap\ActiveForm::className(), \Zelenin\yii\SemanticUI\widgets\ActiveForm::className());
Yii::$container->set(\yii\widgets\Breadcrumbs::className(), \Zelenin\yii\SemanticUI\collections\Breadcrumb::className());
Yii::$container->set(\yii\grid\CheckboxColumn::className(), \Zelenin\yii\SemanticUI\widgets\CheckboxColumn::className());
```

Be very careful with it.

## Credits

[Github repository](https://github.com/seaeagle1/yii2-fomantic-ui)

Derived from the Yii2-Semantic-UI packages by
[Aleksandr Zelenin](https://github.com/zelenin/), e-mail: [aleksandr@zelenin.me](mailto:aleksandr@zelenin.me)
