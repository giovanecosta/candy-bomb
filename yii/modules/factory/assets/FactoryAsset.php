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
        'modules/factory/css/base.css',
    ];
    public $js = [
        'js/angular.js',
        'js/angular-route.js',
        'js/angular-slugify.js',
        'modules/factory/js/app.js',
        'modules/factory/js/route.js',
        'modules/factory/js/controllers/module_template.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset'
    ];
}
