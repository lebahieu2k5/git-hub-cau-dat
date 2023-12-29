<?php
use \yii\web\Request;
$request = new Request();
$baseUrl = str_replace('/backend/web','/admin',$request->baseUrl);
$homeUrl = str_replace("/admin",'',$baseUrl);

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            'downloadAction' => 'gridview/export/download',
        ],
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'baseUrl' => $baseUrl,
            'cookieValidationKey' => '[LuFcCI3t8YhPj7jxbP5t]',
        ],
        'user' => [
            'identityClass' => 'common\models\Admin',
//            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
            'savePath' => sys_get_temp_dir(),
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'class' => 'yii\web\UrlManager',
            'showScriptName' => false,
            'hostInfo' => '/',
            'rules' => [
                '' => 'site/index',
                'dang-nhap-admin' => 'site/login',
                '<controller:\w+>/' => '<controller>/index',
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
        'urlManagerFrontend'=>[
            'baseUrl' => $homeUrl,
            'enablePrettyUrl' => true,
            'class' => 'yii\web\UrlManager',
            'showScriptName'=>false,
            'hostInfo' => '/',
            'suffix'=>'.html',
            'rules' => [
                '' => 'site/index',
                '<catname>/<url>-n<id:\d+>'=>'site/news',
                '<catname>-l<id:\d+>'=>'site/listnews',
                '<title>-l<id:\d+>'=>'site/pages',

                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
    ],
    'params' => $params,
];
