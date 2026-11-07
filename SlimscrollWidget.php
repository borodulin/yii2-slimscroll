<?php
/**
 * @link https://github.com/borodulin/yii2-slimscroll
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-slimscroll/blob/master/LICENSE
 */

namespace conquer\slimscroll;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Wraps the content between begin() and end() into a slimScroll area.
 *
 * ```php
 * <?php SlimscrollWidget::begin(['options' => ['height' => '200px']]); ?>
 * ...
 * <?php SlimscrollWidget::end(); ?>
 * ```
 *
 * @author Andrey Borodulin
 */
class SlimscrollWidget extends Widget
{
    /**
     * slimScroll options, e.g. `['height' => '200px', 'color' => '#00f', 'alwaysVisible' => true]`
     * @link https://github.com/rochal/jQuery-slimScroll#options
     * @var array
     */
    public $options = [];

    /**
     * HTML attributes of the container tag
     * @var array
     */
    public $htmlOptions = [];

    /**
     * Container tag
     * @var string
     */
    public $tag = 'div';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset($this->htmlOptions['id'])) {
            $this->htmlOptions['id'] = $this->getId();
        }
        echo Html::beginTag($this->tag, $this->htmlOptions);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $view = $this->getView();
        SlimscrollAsset::register($view);

        $id = Json::htmlEncode((string)$this->htmlOptions['id']);
        $options = empty($this->options) ? '{}' : Json::htmlEncode($this->options);
        $view->registerJs("jQuery(document.getElementById($id)).slimScroll($options);");

        return Html::endTag($this->tag);
    }
}
