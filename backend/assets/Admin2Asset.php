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
class Admin2Asset extends AssetBundle
{
    public $sourcePath = '@bower/startbootstrap-sb-admin-2/dist';

    public $css = [
        'css/sb-admin-2.css',
    ];
    public $js = [
    ];
}
