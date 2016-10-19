<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin-assets/css/paper-dashboard.css',
        'admin-assets/css/themify-icons.css',
        'admin-assets/css/font-awesome.min.css',
        'css/animate.css',
    ];
    public $js = [
        'admin-assets/js/admin.js',
        'admin-assets/js/paper-dashboard.js',
        'js/bootstrap-notify.min.js'
//        'js/bootstrap.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}

