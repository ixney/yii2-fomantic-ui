<?php

namespace ixney\FomanticUI\collections;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use ixney\FomanticUI\Widget;

class Breadcrumb extends Widget
{
    /**
     * @var array
     */
    public $links = [];

    /**
     * @var array|null|false
     */
    public $homeLink;

    /**
     * @var array
     */
    public $itemOptions = [];

    /**
     * @var bool
     */
    public $encodeLabels = true;

    /**
     * @var string
     */
    public $divider = self::DIVIDER_NORMAL;
    const DIVIDER_NORMAL = ' <li class="divider"> / </li> ';
    const DIVIDER_CHEVRON = ' <i class="right chevron icon divider"></i> ';

    /**
     * @var string
     */
    public $size;

    private $count_level = 1;

    public function init()
    {
        parent::init();
        if($this->homeLink === null)
            $this->homeLink = ['label'=>Yii::t('yii', 'Home'), 'url' =>['/']];
    }

    public function run()
    {
        Html::addCssClass($this->options, 'ui breadcrumb');
        if ($this->size) {
            Html::addCssClass($this->options, $this->size);
        }
        $this->options['vocab'] = 'https://schema.org';
        $this->options['typeof'] = 'BreadcrumbList';

        echo Html::tag('ol', $this->renderItems(), $this->options);
    }

    /**
     * @return string
     */
    public function renderItems()
    {
        $items = [];
        if ($homelink = $this->getHomeLink()) {
            $items[] = $homelink;
        }

        foreach ($this->links as $item) {
            if (!is_array($item)) {
                $item = [
                    'label' => $item
                ];
            }
            $items[] = $this->renderItem($item);
        }
        return implode($this->divider, $items);
    }

    /**
     * @return bool|string
     */
    private function getHomeLink()
    {
        if ($this->homeLink === null) {
            $this->homeLink = [
                'label' => Yii::t('yii', 'Home'),
                'url' => Yii::$app->getHomeUrl(),
            ];
        }
        return $this->homeLink !== false
            ? $this->renderItem($this->homeLink)
            : false;
    }

    /**
     * @param array $item
     *
     * @return string
     */
    protected function renderItem($item)
    {
        $item['label'] = $this->encodeLabels ? Html::encode($item['label']) : $item['label'];

        $options = ArrayHelper::getValue($item, 'options', $this->itemOptions);
        Html::addCssClass($options, 'section');
        $options['typeof'] = 'ListItem';
        $options['property'] = 'itemListElement';

        $a_options = array();
        $a_options['typeof'] = 'WebPage';
        $a_options['property'] = 'item';

        $l_options = array();
        $l_options['property'] = 'name';

        if (isset($item['url'])) {
            $name = Html::tag('span', $item['label'], ['property'=>'name']);
            $link = Html::a($name, Url::to($item['url'], true), $a_options);
            $link .= Html::tag('meta','',['property'=>'position','content'=>$this->count_level++]);
        } else {
            Html::addCssClass($l_options, 'active');
            $link = Html::tag('div', $item['label'], $l_options);
            $link .= Html::tag('meta','',['property'=>'position','content'=>$this->count_level++]);
        }
        $link = Html::tag('li', $link, $options);

        return $link;
    }
}
