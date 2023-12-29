<?php
namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@vendor/components/font-awesome';
    public $css = [
        'css/all.css'
    ];
    public $js = [

    ];

    public $publishOptions = [
        'only' => [
            'css/*',
            'webfonts/*'
        ]
    ];

}
