<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\models\Configure;
use common\models\Menu;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$config = Configure::getConfig();

?>


<?php $this->beginPage() ?>
    <html>
    <head>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?= $content ?>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage(); ?>