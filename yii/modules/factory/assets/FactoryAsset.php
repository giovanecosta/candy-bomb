<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\factory\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FactoryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'factory/css/base.css',
    ];
    public $js = [
        'js/angular.js',
        'factory/js/base.js',
        'factory/js/controllers/test.js',
        'factory/js/controllers/module_template.js',
    ];
    public $depends = [
    ];
}
