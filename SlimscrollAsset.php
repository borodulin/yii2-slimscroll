<?php
/**
 * @link https://github.com/borodulin/yii2-slimscroll
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/jvectormap/blob/master/LICENSE
 */
namespace conquer\slimscroll;

class SlimscrollAsset extends \yii\web\AssetBundle
{
	// The files are not web directory accessible, therefore we need
	// to specify the sourcePath property. Notice the @bower alias used.
	public $sourcePath = '@bower/slimscroll';
	
	public $js=[
			'jquery.slimscroll.min.js',
	];
	
	public $depends = [
			'yii\web\JqueryAsset',
	];
}