<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Catnew */
?>
<div class="catnew-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'active',
            'home',
            'ord',
            'parent',
            'position',
            'seo_desc:ntext',
            'seo_title',
            'seo_keyword',
            'url:ntext',
        ],
    ]) ?>

</div>
