<?php
namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class JqueryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
    ];
    public $js = [
        'themes/js/jquery-1.11.3.min.js'
    ];
    public $publishOptions = [
        'only' => [
            'themes/js/jquery-1.11.3.min.js'
        ]
    ];
}
