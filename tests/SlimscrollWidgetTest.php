<?php

namespace conquer\slimscroll\tests;

use conquer\slimscroll\SlimscrollWidget;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\helpers\FileHelper;
use yii\web\Application;
use yii\web\View;

class SlimscrollWidgetTest extends TestCase
{
    private $assetPath;

    protected function setUp(): void
    {
        $this->assetPath = sys_get_temp_dir() . '/slimscroll-test-' . uniqid();
        mkdir($this->assetPath);
        new Application([
            'id' => 'test',
            'basePath' => __DIR__,
            'vendorPath' => dirname(__DIR__) . '/vendor',
            'aliases' => ['@bower' => '@vendor/bower-asset', '@npm' => '@vendor/npm-asset'],
            'components' => [
                'request' => ['cookieValidationKey' => 'test', 'scriptFile' => __DIR__ . '/index.php', 'scriptUrl' => '/index.php'],
                'assetManager' => ['basePath' => $this->assetPath, 'baseUrl' => '/assets'],
            ],
        ]);
    }

    protected function tearDown(): void
    {
        FileHelper::removeDirectory($this->assetPath);
        Yii::$app = null;
    }

    private function render(array $config)
    {
        $view = new View();
        Yii::$app->set('view', $view);
        ob_start();
        SlimscrollWidget::begin($config);
        echo '<p>content</p>';
        SlimscrollWidget::end();
        $widget = ob_get_clean();
        $html = $view->renderFile(__DIR__ . '/views/page.php');
        return [$widget, $html];
    }

    public function testWrapsContent()
    {
        list($widget, $html) = $this->render(['htmlOptions' => ['class' => 'box']]);
        $this->assertSame('<div id="w0" class="box"><p>content</p></div>', $widget);
        $this->assertMatchesRegularExpression('#src="/assets/\w+/jquery\.slimscroll\.min\.js"#', $html);
        $this->assertStringContainsString('jQuery(document.getElementById("w0")).slimScroll({});', $html);
    }

    public function testCustomTag()
    {
        list($widget) = $this->render(['tag' => 'section', 'htmlOptions' => ['id' => 'list']]);
        $this->assertSame('<section id="list"><p>content</p></section>', $widget);
    }

    public function testOptions()
    {
        list(, $html) = $this->render(['options' => ['height' => '200px', 'alwaysVisible' => true]]);
        $this->assertStringContainsString('.slimScroll({"height":"200px","alwaysVisible":true});', $html);
    }

    public function testIdAndOptionsAreEncoded()
    {
        list(, $html) = $this->render([
            'htmlOptions' => ['id' => "we'ird.id:x"],
            'options' => ['color' => '</script><script>alert(1)</script>'],
        ]);
        $this->assertStringContainsString('document.getElementById("we\\u0027ird.id:x")', $html);
        $this->assertStringNotContainsString('<script>alert(1)', $html);
    }
}
