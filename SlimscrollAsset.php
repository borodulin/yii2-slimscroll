<?php
/**
 * @link https://github.com/borodulin/yii2-slimscroll
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-slimscroll/blob/master/LICENSE
 */

namespace conquer\slimscroll;

use yii\web\AssetBundle;

/**
 * jQuery slimScroll plugin
 * @link https://github.com/rochal/jQuery-slimScroll
 * @author Andrey Borodulin
 */
class SlimscrollAsset extends AssetBundle
{
    public $sourcePath = '@bower/slimscroll';

    public $js = [
        'jquery.slimscroll.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
