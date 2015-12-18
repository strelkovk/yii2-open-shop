<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BootstrapTableAsset extends AssetBundle
{
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];

    public $sourcePath = '@bower/bootstrap-table/dist';

    public $css = [
        'bootstrap-table.min.css'
    ];
    public $js = [
        'bootstrap-table.min.js',
        //'extensions/filter/bootstrap-table-filter.min.js',
    ];
    public $depends = [

    ];
}
