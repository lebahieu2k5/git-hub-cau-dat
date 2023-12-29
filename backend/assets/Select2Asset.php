<?php
namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class Select2Asset extends AssetBundle
{
    public $sourcePath = '@vendor/select2/select2/dist';
    public $css = [
        'css/select2.min.css'
    ];
    public $js = [
        'js/select2.full.min.js'
    ];

}
