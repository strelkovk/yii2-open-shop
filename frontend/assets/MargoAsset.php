<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MargoAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/responsive.css',
        'css/slicknav.css',
        'css/animate.css',
        'css/style.css',
        'css/colors/red.css',
    ];
    public $js = [
        'js/jquery.slicknav.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapAsset',
    ];
}
