<?php

namespace icms\FomanticUI\widgets;

class GridView extends \yii\grid\GridView
{
    /**
     * @var array
     */
    public $tableOptions = ['class' => 'ui table'];

    /**
     * @var string
     */
    public $dataColumnClass = 'icms\FomanticUI\widgets\DataColumn';

    /**
     * @var array
     */
    public $pager = ['class' => 'icms\FomanticUI\widgets\LinkPager'];
}
