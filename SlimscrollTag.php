<?php
/**
 * @link https://github.com/borodulin/yii2-slimscroll
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/jvectormap/blob/master/LICENSE
 */
namespace conquer\slimscroll;

use yii\helpers\Html;
use yii\base\InvalidCallException;
use yii\helpers\Json;

class SlimscrollTag extends \yii\base\Component
{
	
	private static $stack=[];

	/**
	 * 
	 * @var \yii\web\View
	 */
	public $view;
	
	/**
	 * SlimScroll options
	 * @link http://rocha.la/jQuery-slimScroll 
	 * @var array()
	 */
	public $options;
	
	/**
	 * Tag Html attributes
	 * @var array()
	 */
	public $htmlOptions;
	
	/**
	 * Tag
	 * @var string
	 */
	public $tag='div';
	
	/**
	 * Generates a start tag and registers SlimScroll. 
	 * @see \yii\helpers\BaseHtml::beginTag()
	 * @param array() $config
	 * @return string
	 */
	public static function  beginTag($config)
	{
		$config['class'] = get_called_class();
		/* @var $widget SlimscrollTag */
		$widget = \Yii::createObject($config);
		static::$stack[] = $widget;
		if(empty($widget->htmlOptions['id']))
			$widget->htmlOptions['id']=$widget->generateId();

		$view= empty($widget->view)?\Yii::$app->getView():$widget->view;
		
		$options=Json::encode($widget->options);
		
		SlimscrollAsset::register($view);
		
		$view->registerJs("jQuery('#{$widget->htmlOptions['id']}').slimScroll($options);");
		
		return Html::beginTag($widget->tag, $widget->htmlOptions);
	}

	/**
	 * Generates an end tag.
	 * @see \yii\helpers\BaseHtml::endTag()
	 * @throws InvalidCallException
	 * @return string
	 */
	public static function endTag()
	{
		if (!empty(static::$stack)) {
			$widget = array_pop(static::$stack);
			if (get_class($widget) === get_called_class()) {
				return Html::endTag($widget->tag);
			} else {
				throw new InvalidCallException("Expecting end() of " . get_class($widget) . ", found " . get_called_class());
			}
		} else {
			throw new InvalidCallException("Unexpected " . get_called_class() . '::end() call. A matching begin() is not found.');
		}
	}
	
	
	/**
	 * Returns the ID of the widget.
	 * @return string ID of the widget.
	 */
	private function generateId()
	{
		static $id=0;
		return  'ws_'. $id++;
	}
	
}