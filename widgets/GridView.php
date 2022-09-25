<?php

namespace ixney\FomanticUI\widgets;

class GridView extends \yii\grid\GridView
{
    /**
     * @var array
     */
    public $tableOptions = ['class' => 'ui table'];

    /**
     * @var string
     */
    public $dataColumnClass = 'ixney\FomanticUI\widgets\DataColumn';

    /**
     * @var array
     */
    public $pager = ['class' => 'ixney\FomanticUI\widgets\LinkPager'];
}
